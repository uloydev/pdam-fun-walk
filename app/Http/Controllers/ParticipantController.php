<?php

namespace App\Http\Controllers;

use App\Mail\ParticipantVerification;
use App\Mail\ParticipantVerified;
use App\Models\Participant;
use App\Models\ShirtStock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function public(Request $req)
    {
        $pagination = $req->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1',
            'sortBy' => 'nullable|string|in:id,name,email,phone,nik,customer_code',
            'sortType' => 'nullable|string|in:asc,desc',
            'search' => 'nullable|string',
        ]);

        $pagination['page'] = $pagination['page'] ?? 1;
        $pagination['per_page'] = $pagination['per_page'] ?? 10;

        $query = Participant::with('shirtStock')
            ->where([
                ['customer_code', '=', null],
                ['email_verified_at', 'IS NOT', null]
            ]);
        if (isset($pagination['search']) && $pagination['search']) {
            // $query->where('email', 'like', "%{$pagination['search']}%")
            // ->orWhere('nik', 'like', "%{$pagination['search']}%")
            // ->orWhere('customer_code', 'like', "%{$pagination['search']}%");
        } else {
            $pagination['search'] = '';
        }
        $numSearch = (int) $pagination['search'];
        if ($numSearch) {
            $query->where('id', $numSearch);
        }

        if (isset($pagination['sortBy']) && $pagination['sortBy']) {
            if (isset($pagination['sortType']) && $pagination['sortType'] === 'desc') {
                $query->orderByDesc($pagination['sortBy']);
            } else {
                $query->orderBy($pagination['sortBy']);
                $pagination['sortType'] = 'asc';
            }
        } else {
            $query->orderBy('id');
            $pagination['sortBy'] = '';
        }

        // dd($query->toSql());

        $participants = $query->paginate($pagination['per_page'] ?? 10)->withQueryString();

        // check if ajax request
        if ($req->expectsJson()) {
            return $participants;
        }

        return view('dashboard.participant', [
            'participants' => $participants,
            'pagination' => $pagination,
            'title' => 'Peserta Umum',
            'type' => 'public',
        ]);
    }

    public function customer(Request $req)
    {
        $pagination = $req->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1',
            'sortBy' => 'nullable|string|in:id,name,email,phone,nik,customer_code',
            'sortType' => 'nullable|string|in:asc,desc',
            'search' => 'nullable|string',
        ]);

        $pagination['page'] = $pagination['page'] ?? 1;
        $pagination['per_page'] = $pagination['per_page'] ?? 10;

        $query = Participant::with('shirtStock')
            ->where('customer_code', 'IS NOT', null)
            ->where('email_verified_at', 'IS NOT', null);
        if (isset($pagination['search']) && $pagination['search']) {
            // $query->where('email', 'like', "%{$pagination['search']}%")
            // ->orWhere('nik', 'like', "%{$pagination['search']}%")
            // ->orWhere('customer_code', 'like', "%{$pagination['search']}%");
        } else {
            $pagination['search'] = '';
        }
        $numSearch = (int) $pagination['search'];
        if ($numSearch) {
            $query->where('id', $numSearch);
        }

        if (isset($pagination['sortBy']) && $pagination['sortBy']) {
            if (isset($pagination['sortType']) && $pagination['sortType'] === 'desc') {
                $query->orderByDesc($pagination['sortBy']);
            } else {
                $query->orderBy($pagination['sortBy']);
                $pagination['sortType'] = 'asc';
            }
        } else {
            $query->orderBy('id');
            $pagination['sortBy'] = '';
        }

        $participants = $query->paginate($pagination['per_page'] ?? 10)->withQueryString();

        // check if ajax request
        if ($req->expectsJson()) {
            return $participants;
        }

        return view('dashboard.participant', [
            'participants' => $participants,
            'pagination' => $pagination,
            'title' => 'Peserta Pelanggan PDAM',
            'type' => 'customer',
        ]);
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
            'nik' => 'required|string|min:16|max:16|unique:participants,nik',
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
            'nik.max' => 'NIK maksimal 16 karakter',
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
        } else if ($shirtStock->type !== $data['type']) {
            return response()->json([
                'errors' => [
                    'shirt_stock_id' => ['Ukuran baju ' . $shirtStock->size . ' tidak valid'],
                ],
                'message' => 'Ukuran baju tidak valid',
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
        if ($participantCount >= 1000 || true) {
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

        $shirtStock->decrement('stock');
        Mail::to($participant->email)->send(new ParticipantVerified($participant, $shirtStock));

        return redirect()->route('index')->with('alert', [
            "title" => 'Terima kasih!',
            "html" => '<p>Data peserta berhasil diverifikasi.</p><p>Silahkan cek email untuk bukti registrasi Anda.</p>',
            "icon" => 'success',
            "confirmButtonText" => 'Kembali'
        ]);
    }

    public function pickupKit(String $id)
    {
        $id = (int) $id;
        $participant = Participant::find($id);
        if (!$participant) {
            return response()->json([
                'message' => 'Peserta tidak ditemukan',
            ], 404);
        }

        // check if not verified
        if (!$participant->email_verified_at) {
            return response()->json([
                'message' => 'Peserta belum terverifikasi',
            ], 400);
        }

        $participant->update([
            'kit_received_at' => Carbon::now(),
        ]);

        return response()->json([
            'message' => 'Kit received successfully',
            'data' => $participant,
            'timestamp' =>
            $participant->kit_received_at->format('d M Y H:i:s'),
        ]);
    }

    public function checkin(String $id)
    {
        $id = (int) $id;
        $participant = Participant::find($id);
        if (!$participant) {
            return response()->json([
                'message' => 'Peserta tidak ditemukan',
            ], 404);
        }

        // check if not verified
        if (!$participant->email_verified_at) {
            return response()->json([
                'message' => 'Peserta belum terverifikasi',
            ], 400);
        }

        // check if not received kit
        if (!$participant->kit_received_at) {
            return response()->json([
                'message' => 'Peserta belum menerima kit',
            ], 400);
        }

        $participant->checkin_at = now();
        $participant->save();

        return response()->json([
            'message' => 'Checkin successfully',
            'data' => $participant,
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
