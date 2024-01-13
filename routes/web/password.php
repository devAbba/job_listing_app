<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::middleware('guest')->group(function (){
    Route::get('/forgot-password', [UserController::class, 'passwordReset'])->name('password.request');

    Route::post('/forgot-password', [UserController::class, 'passwordMail'])->name('password.email');

    Route::get('/reset-password/{token}', [UserController::class, 'newPassword'])->name('password.reset');

    Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('password.update');
});
