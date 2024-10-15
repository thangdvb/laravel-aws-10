<?php

use App\Http\Controllers\LoginSNSController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('auth/google', [LoginSNSController::class, 'redirectToGoogle']);
// Route::get('auth/google/callback', [LoginSNSController::class, 'handleGoogleCallback']);
// Route::get('auth/facebook', [LoginSNSController::class, 'redirectToFacebook']);
// Route::get('auth/facebook/callback', [LoginSNSController::class, 'handleFacebookCallback']);

