<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;


// Auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {

    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Orders
    Route::get('/orders/{id}', [OrderController::class, 'show']);
   Route::middleware('auth:api')->group(function () {

    Route::get('/orders/{id}', [OrderController::class, 'show']);

    Route::post('/orders/{id}/cancel', [OrderController::class, 'cancel']);

});

});