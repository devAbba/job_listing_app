<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;

Route::middleware('auth')->group(function() {
    Route::get('/listings/create', [ListingController::class, 'create']);

    Route::post('/listings', [ListingController::class, 'store']);

    Route::get('/listings/manage', [ListingController::class, 'manage']);

    Route::get('/listings/edit/{listing}', [ListingController::class, 'edit']);

    Route::put('/listings/{listing}', [ListingController::class, 'update']);

    Route::delete('/listings/{listing}', [ListingController::class, 'destroy']);

    Route::get('/listings/{listing}', [ListingController::class, 'show'])->withoutMiddleware('auth');
});
