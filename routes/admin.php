<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;


/* ======Admin Routes====== */
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

//Route::get('profile', [ProfileController::class, 'index'])->name('profile');
//Route::resource('profile', ProfileController::class);

// Profile Routes
Route::prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::post('/update', [ProfileController::class, 'update'])->name('update');
});