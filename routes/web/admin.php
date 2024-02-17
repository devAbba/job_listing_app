<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin/users', [AdminController::class, 'users']);

    Route::get('/admin/listings', [AdminController::class, 'listings']);
});
