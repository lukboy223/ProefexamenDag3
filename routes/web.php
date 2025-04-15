<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

Route::get('/', function () {
    return view('welcome');
});

// peopel
Route::get('/peopel', [PersonController::class, 'index'])->name('peopel.index');
// edit
Route::get('/peopel/edit/{id}', [PersonController::class, 'edit'])->name('peopel.edit');
// update
Route::post('/peopel/update/{id}', [PersonController::class, 'update'])->name('peopel.update');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
