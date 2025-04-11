<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function (){
    Route::get('/Reservaties', [ResultController::class, 'index'])->name('results.index');
    Route::get('/Reservaties/resultaten/{id}', [ResultController::class, 'show'])->name('results.show');
    Route::get('/Reservaties/resultaten/aanpassen/{id}', [ResultController::class, 'edit'])->name('results.edit');
    Route::patch('/Reservaties/resultaten/update/{id}', [ResultController::class, 'update'])->name('results.update');
});

require __DIR__.'/auth.php';
