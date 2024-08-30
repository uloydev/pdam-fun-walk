<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ParticipantController;
use App\Models\ShirtStock;
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



Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('index');

    Route::get('/customer', 'customerIndex')->name('customer.index');

    Route::prefix('participant')->name('participant.')->controller(ParticipantController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
