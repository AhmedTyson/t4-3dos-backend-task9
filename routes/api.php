<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminOrderController;
// Auth routes (Tymon JWT)
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth:api'])->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth:api', 'isAdmin'])->group(function () {
    //
});
// Cart routes
// Order routes
// Admin routes

Route::middleware(['auth:api', 'admin'])->prefix('admin')->group(function () {
    Route::get('orders', [AdminOrderController::class, 'index']);
    Route::put('orders/{order}/status', [AdminOrderController::class, 'updateStatus']);
    Route::get('orders/{order}/print-file', [AdminOrderController::class, 'printFile']);
    Route::get('reports/sales', [AdminOrderController::class, 'salesReport']);
});