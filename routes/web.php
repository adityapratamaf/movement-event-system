<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestArrivalController;
use App\Http\Controllers\DisplayController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'event'])->group(function () {
    // semua route di sini punya event_id
    Route::get('/checkin', [GuestArrivalController::class, 'index']);
    Route::post('/checkin', [GuestArrivalController::class, 'store']);
    Route::get('/display/{id}', [DisplayController::class, 'show']);
});

require __DIR__.'/auth.php';
