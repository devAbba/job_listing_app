<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::middleware('guest')->group(function() {
    Route::post('/users', [UserController::class, 'store']);

    Route::post('/users/login', [UserController::class, 'authenticate']);
});
