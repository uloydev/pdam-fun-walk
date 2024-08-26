<?php

namespace App\Http\Controllers;

use App\Mail\ParticipantVerification;
use App\Mail\ParticipantVerified;
use App\Models\Participant;
use App\Models\ShirtStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'type' => 'required|string|in:public,customer',
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:participants,email',
            'phone' => 'required|string|max:20',
            'nik' => 'required|string|min:16|max:20|unique:participants,nik',
            'customer_code' => 'required_if:type,customer|string|max:50|exists:customers,customer_code|unique:participants,customer_code',
            'additional_participant' => 'array|nullable|max:2',
            'additional_participant.*.name' => 'required|string|max:100',
            'additional_participant.*.relation' => 'required|string|max:100|in:suami,istri,anak,adik,kakak,saudara',
            'shirt_stock_id' => 'required|exists:shirt_stocks,id',
            'instagram' => 'required|string|max:200',
        ], [
            'name.required' => 'Harap masukkan nama',
            'name.max' => 'Nama maksimal 100 karakter',
            'email.required' => 'Harap masukkan email',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 100 karakter',
            'email.unique' => 'Email sudah terdaftar sebagai peserta',
            'phone.required' => 'Harap masukkan nomor telepon',
            'phone.max' => 'Nomor telepon maksimal 20 karakter',
            'nik.required' => 'Harap masukkan NIK',
            'nik.min' => 'NIK minimal 16 karakter',
            'nik.max' => 'NIK maksimal 20 karakter',
            'nik.unique' => 'NIK sudah terdaftar sebagai peserta',
            'customer_code.max' => 'Nomor Pelanggan PDAM maksimal 50 karakter',
            'customer_code.exists' => 'Nomor Pelanggan PDAM tidak valid',
            'customer_code.unique' => 'Nomor Pelanggan PDAM sudah pernah terdaftar sebagai peserta',
            'customer_code.required_if' => 'Nomor Pelanggan PDAM harus diisi',
            'additional_participant.max' => 'Maksimal 2 peserta tambahan',
            'additional_participant.*.name.required' => 'Nama peserta tambahan harus diisi',
            'additional_participant.*.name.max' => 'Nama peserta tambahan maksimal 100 karakter',
            'additional_participant.*.relation.required' => 'Hubungan peserta tambahan harus diisi',
            'additional_participant.*.relation.max' => 'Hubungan peserta tambahan maksimal 100 karakter',
            'additional_participant.*.relation.in' => 'Hubungan peserta tambahan tidak valid',
            'shirt_stock_id.required' => 'Harap pilih ukuran baju',
            'shirt_stock_id.exists' => 'Ukuran baju tidak tersedia',
            'instagram.required' => 'Harap masukkan username Instagram',
            'instagram.max' => 'Username Instagram maksimal 200 karakter',
        ]);

        // token with uuid
        $data['token'] = Str::uuid();

        $registeredCount = Participant::where('email_verified_at', 'IS NOT', null)->count();
        if ($registeredCount >= 1000) {
            return response()->json([
                'errors' => [
                    'custom' => ['Kuota Peserta Tidak Tersedia'],
                ],
                'message' => 'Registrasi peserta sudah mencapai batas maksimal',
            ], 400);
        }

        $shirtStock = ShirtStock::find($data['shirt_stock_id']);
        if ($shirtStock->stock <= 0) {
            return response()->json([
                'errors' => [
                    'shirt_stock_id' => ['Ukuran baju ' . $shirtStock->size . ' sudah habis'],
                ],
                'message' => 'Ukuran baju tidak tersedia',
            ], 400);
        }

        // create participant
        $participant = Participant::create($data);
        
        $link = route('participant.verify') . '?token=' . $participant->token;


        // send email
        Mail::to($participant->email)->send(new ParticipantVerification($participant, $link));

        return response()->json([
            'message' => 'Participant created successfully',
            'data' => $participant,
        ]);
    }

    public  function verify(Request $request)
    {
        $data = $request->validate([
            'token' => 'required|string|exists:participants,token',
        ], [
            'token.required' => 'Token tidak ditemukan',
            'token.exists' => 'Token tidak valid',
        ]);

        $participant = Participant::where('token', $data['token'])->first();

        if ($participant->email_verified_at) {
            return redirect()->route('index')->with('alert', [
                "title" => 'Maaf...',
                "text" => 'Email sudah terverifikasi sebelumnya',
                "icon" => 'warning',
                "confirmButtonText" => 'Kembali'
            ]);
        }

        $participantCount = Participant::where('email_verified_at', 'IS NOT', null)->count();
        if ($participantCount >= 1000) {
            return redirect()->route('index')->with('alert', [
                "title" => 'Maaf...',
                "text" => 'Gagal verifikasi email karena kuota peserta sudah terpenuhi',
                "icon" => 'warning',
                "confirmButtonText" => 'Kembali'
            ]);
        }

        $shirtStock = ShirtStock::find($participant->shirt_stock_id);

        if (!$shirtStock) {
            $participant->delete();
            return redirect()->route('index')->with('alert', [
                "title" => 'Maaf...',
                "text" => 'Gagal verifikasi email karena ukuran baju tidak tersedia, silahkan registrasi ulang dan pilih ukuran baju lain',
                "icon" => 'warning',
                "confirmButtonText" => 'Kembali'
            ]);
        }

        if ($shirtStock->stock <= 0) {
            $participant->delete();
            return redirect()->route('index')->with('alert', [
                "title" => 'Maaf...',
                "text" => 'Gagal verifikasi email karena ukuran baju ' . $shirtStock->size . ' sudah habis, silahkan registrasi ulang dan pilih ukuran baju lain',
                "icon" => 'warning',
                "confirmButtonText" => 'Kembali'
            ]);
        }

        $participant->email_verified_at = now();
        $participant->save();

        $participant->shirtStock->decrement('stock');
        Mail::to($participant->email)->send(new ParticipantVerified($participant, $shirtStock));

        return redirect()->route('index')->with('alert', [
            "title" => 'Terimakasih!',
            "html" => '<p>Data peserta berhasil diverifikasi</p><p>Silahkan check email untuk bukti registrasi</p>',
            "icon" => 'success',
            "confirmButtonText" => 'Kembali'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Participant $participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Participant $participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Participant $participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Participant $participant)
    {
        //
    }
}
