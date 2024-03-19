<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index']);

    Route::get('/admin/users', [AdminController::class, 'users']);

    Route::get('/admin/listings', [AdminController::class, 'listings']);
});
