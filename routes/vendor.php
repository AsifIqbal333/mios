<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\VendorController;

/* ======Vendor Routes====== */
Route::get('dashboard', [VendorController::class, 'dashboard'])->name('dashboard');
