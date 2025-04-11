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

//all routes for scores
Route::middleware('auth')->group(function (){
    //index with all reservations
    Route::get('/Reservaties', [ResultController::class, 'index'])->name('results.index');

    //shows the scores per reservation
    Route::get('/Reservaties/resultaten/{id}', [ResultController::class, 'show'])->name('results.show');

    //edit form for 1 score
    Route::get('/Reservaties/resultaten/aanpassen/{id}', [ResultController::class, 'edit'])->name('results.edit');

    //updates the score
    Route::patch('/Reservaties/resultaten/update/{id}', [ResultController::class, 'update'])->name('results.update');
});

require __DIR__.'/auth.php';
