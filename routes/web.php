<?php

use App\DataTables\CustomerDataTable;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use App\Models\Customer;
use App\Models\Participant;
use App\Models\ShirtStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'shirt_stock' => ShirtStock::where('stock', '>', 0)->get(),
    ]);
})->name('index');

Route::name('participant.')->prefix('participant')->controller(ParticipantController::class)->group(function () {
    Route::post('/register', 'store')->name('register');
    Route::get('/verify', 'verify')->name('verify');
});



Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', function () {
        $verifiedQuery = Participant::whereNotNull('email_verified_at');

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
            'customerParticipant' => $verifiedQuery->whereNotNull('customer_code')->count() + 250,
            'publicParticipant' => $verifiedQuery->whereNull('customer_code')->count() + 348,
            'customerQuota' => ShirtStock::where('type', 'customer')->sum('stock'),
            'publicQuota' => ShirtStock::where('type', 'public')->sum('stock'),
            'customerStock' => $customerStock,
            'publicStock' => $publicStock,
        ]);
    })->name('index');

    Route::get('/customer', function (Request $req) {
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
            'customers'=> $customers,
            'pagination' => $pagination,
        ]);
    })->name('customer.index');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
