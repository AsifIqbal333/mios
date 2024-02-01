<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminController;


/* ======Admin Routes====== */
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
