<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\VerificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// require __DIR__ . '/web/listings.php';
\App\Helpers\Routes\RouteHelper::includeRouteFiles(__DIR__ . '/web');

Route::get('/', [ListingController::class, 'index']);

Route::get('/signup', [UserController::class, 'signup'])->middleware('guest');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/email/verify', [VerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', [VerificationController::class, 'sendMail'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');

if (\Illuminate\Support\Facades\App::environment('local')){
    Route::get('/playground', function (){
        $user = \App\Models\User::factory()->make();
        return (new \App\Mail\WelcomeMail($user))->render();
    });
}

// Common Resource Routes:
// index - show all listings
// show - show single listing
// create -  show form to create new listing
// store - store new listing
// edit - show form to edit listing
// update - update listing
// destroy - delete listing


