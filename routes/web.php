<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route to display the reservations list
Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');

// Route to display the edit form
Route::get('/reservations/{id}/{resId}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');

// Route to handle the update request
Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';