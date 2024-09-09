<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Participant;
use App\Models\Prize;
use App\Models\PrizeWinner;
use App\Models\ShirtStock;
use App\Models\TopCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $customerStock = DB::table(DB::raw('shirt_stocks s'))
            ->leftJoin(DB::raw('participants p'), function ($join) {
                $join->on(DB::raw('s.id'), '=', DB::raw('p.shirt_stock_id'));
                $join->on(DB::raw('p.email_verified_at'), 'is not', DB::raw('NULL'));
                $join->on(DB::raw('p.customer_code'), 'is not', DB::raw('NULL'));
            })
            ->select(
                DB::raw('max(s.size) as size'),
                DB::raw('count(p.id) as used_stock'),
                DB::raw('max(s.stock) as remaining_stock'),
                DB::raw('count(p.id)+max(s.stock) as total_stock'),
            )
            ->where(DB::raw('s.type'), 'customer')
            ->groupBy(DB::raw('s.id'))
            ->get();

        $publicStock = DB::table(DB::raw('shirt_stocks s'))
            ->leftJoin(DB::raw('participants p'), function ($join) {
                $join->on(DB::raw('s.id'), '=', DB::raw('p.shirt_stock_id'));
                $join->on(DB::raw('p.email_verified_at'), 'is not', DB::raw('NULL'));
                $join->on(DB::raw('p.customer_code'), 'is', DB::raw('NULL'));
            })
            ->select(
                DB::raw('max(s.size) as size'),
                DB::raw('count(p.id) as used_stock'),
                DB::raw('max(s.stock) as remaining_stock'),
                DB::raw('count(p.id)+max(s.stock) as total_stock'),
            )
            ->where(DB::raw('s.type'), 'public')
            ->groupBy(DB::raw('s.id'))
            ->get();

        return view('dashboard.index', [
            'customerParticipant' => Participant::whereNotNull('email_verified_at')->whereNotNull('customer_code')->count(),
            'publicParticipant' => Participant::whereNotNull('email_verified_at')->whereNull('customer_code')->count(),
            'customerQuota' => ShirtStock::where('type', 'customer')->sum('stock'),
            'publicQuota' => ShirtStock::where('type', 'public')->sum('stock'),
            'customerStock' => $customerStock,
            'publicStock' => $publicStock,
            'customerKitsTaken' => Participant::whereNotNull('email_verified_at')->whereNotNull('customer_code')->whereNotNull('kit_received_at')->count(),
            'publicKitsTaken' => Participant::whereNotNull('email_verified_at')->whereNull('customer_code')->whereNotNull('kit_received_at')->count(),
            'customerCheckin' => Participant::whereNotNull('email_verified_at')->whereNotNull('customer_code')->whereNotNull('checkin_at')->count(),
            'publicCheckin' => Participant::whereNotNull('email_verified_at')->whereNull('customer_code')->whereNotNull('checkin_at')->count(),
        ]);
    }

    public function customerIndex(Request $req)
    {
        $pagination = $req->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1',
            'sortBy' => 'nullable|string|in:name,customer_code',
            'sortType' => 'nullable|string|in:asc,desc',
            'search' => 'nullable|string',
        ]);

        $pagination['page'] = $pagination['page'] ?? 1;
        $pagination['per_page'] = $pagination['per_page'] ?? 10;

        $query = Customer::query();
        if (isset($pagination['search']) && $pagination['search']) {
            $query->where('name', 'like', "%{$pagination['search']}%")
                ->orWhere('customer_code', 'like', "%{$pagination['search']}%");
        } else {
            $pagination['search'] = '';
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

        $customers = $query->paginate($pagination['per_page'] ?? 10)->withQueryString();

        // check if ajax request
        if ($req->expectsJson()) {
            return $customers;
        }

        return view('dashboard.customer', [
            'customers' => $customers,
            'pagination' => $pagination,
        ]);
    }

    public function shirtIndex(Request $req)
    {
        $pagination = $req->validate([
            'page' => 'nullable|integer|min:1',
            'per_page' => 'nullable|integer|min:1',
            'sortBy' => 'nullable|string|in:size,stock,type',
            'sortType' => 'nullable|string|in:asc,desc',
            'search' => 'nullable|string',
        ]);

        $pagination['page'] = $pagination['page'] ?? 1;
        $pagination['per_page'] = $pagination['per_page'] ?? 10;

        $query = ShirtStock::withCount('participants');
        if (isset($pagination['search']) && $pagination['search']) {
            $query->where('size', 'like', "%{$pagination['search']}%")
                ->orWhere('stock', 'like', "%{$pagination['search']}%");
        } else {
            $pagination['search'] = '';
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

        $shirts = $query->paginate($pagination['per_page'] ?? 10)->withQueryString();

        // check if ajax request
        if ($req->expectsJson()) {
            return $shirts;
        }

        return view('dashboard.shirt', [
            'shirts' => $shirts,
            'pagination' => $pagination,
        ]);
    }

    public function doorprize(Request $req)
    {
        // check if request has prize_id

        $data = $req->validate([
            'prize_id' => 'nullable|exists:prizes,id',
        ]);

        $prizes = Prize::all();

        $winners = collect([]);
        if (isset($data['prize_id'])) {
            $winners = PrizeWinner::where('prize_id', $data['prize_id'])->get();
        }
        // map each id and change it to padded number 4 digit
        $winners = $winners->mapWithKeys(function ($name, $id) {
            return [str_pad($id, 4, '0', STR_PAD_LEFT) => $name];
        });
        return view('dashboard.doorprize', compact('prizes', 'winners'));
    }

    public function doorprizeSpin(Request $req)
    {
        $data = $req->validate([
            'prize_id' => 'required|exists:prizes,id',
        ]);

        $prize = Prize::find($data['prize_id']);

        $winnerCount = $prize->winners()->count();

        if ($winnerCount >= $prize->amount) {
            return response()->json([
                'status' => 'error',
                'message' => 'Doorprize ini sudah dipilih semua pemenangnya',
            ], 400);
        }

        $prizeWinner = new PrizeWinner();
        $prizeWinner->prize_id = $prize->id;
        $winnerIds = $prize->winners()->pluck('user_id')->toArray();

        if ($prize->is_prime) {
            $winner = TopCustomer::whereNotIn('customer_code', $winnerIds)->inRandomOrder()->first();
            $prizeWinner->user_id = $winner->customer_code;
        } else {
            $winner = Participant::whereNotNull('email_verified_at')
                ->whereNotIn('id', $winnerIds)
                ->inRandomOrder()
                ->first();
            $prizeWinner->user_id =
            str_pad($winner->id, 4, '0', STR_PAD_LEFT);
        }

        $prizeWinner->name = $winner->name;
        $prizeWinner->save();

        return response()->json([
            'status' => 'success',
            'message' => 'success',
            'data' => $prizeWinner,
        ]);
    }

    public function doorprizeWinner(Prize $prize)
    {
        $winners = PrizeWinner::where('prize_id', $prize->id)->get();

        $winners->transform(function ($winner) {
            $winner->user_id = str_pad($winner->user_id, 4, '0', STR_PAD_LEFT);
            return $winner;
        });

        // return json
        return response()->json([
            'status' => 'success',
            'message' => 'success',
            'data' => $winners,
        ]);
    }

    public function doorprizeDelete(PrizeWinner $prizeWinner)
    {
        $prizeWinner->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'success',
        ]);
    }
}
