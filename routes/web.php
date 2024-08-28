<?php

use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
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



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
