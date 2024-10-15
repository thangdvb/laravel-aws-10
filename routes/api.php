<?php

use App\Http\Controllers\LoginSNSController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('auth/google', [LoginSNSController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginSNSController::class, 'handleGoogleCallback']);
Route::get('auth/facebook', [LoginSNSController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [LoginSNSController::class, 'handleFacebookCallback']);
