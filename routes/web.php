<?php

use  App\Http\Controllers\AdminController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware(['auth', Admin::class])->group(function () {

    Route::get('/admin', [AdminController::class, 'admin'])
        ->name('admin');


    Route::put('/plants/{plant}/toggle', [AdminController::class, 'toggle'])
        ->name('plants.toggle');


});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('plant', PlantController::class)
        ->withoutMiddlewareFor('index', 'auth');
});

require __DIR__ . '/auth.php';
