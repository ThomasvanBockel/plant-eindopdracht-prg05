<?php

use  App\Http\Controllers\AdminController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;


Route::get('/', [PlantController::class, 'welcome']);

Route::middleware(['auth', Admin::class])->group(function () {

    Route::get('/admin', [AdminController::class, 'admin'])
        ->name('admin');

    Route::post('/plants/{plant}/toggle', [AdminController::class, 'toggle'])
        ->name('plants.toggle');


});
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })
        ->name('dashboard');

    Route::get('/myPlants', [PlantController::class, 'myPlants'])
        ->name('myPlants');

    Route::resource('plant', PlantController::class);
});

require __DIR__ . '/auth.php';
