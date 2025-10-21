<?php

use App\Http\Controllers\PlantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('plants', [PlantController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('plants');

Route::get('/details/{plant}', [PlantController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('plants.show');
*/
Route::get('/admin', function () {
    return view('admin');
})
    ->name('admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resource('plant', PlantController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
