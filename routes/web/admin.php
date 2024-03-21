<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin-dashboard');

    Route::get('/admin/users', [AdminController::class, 'users'])->name('accounts');

});
