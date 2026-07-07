<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminOrderController;
// Auth routes (Tymon JWT)
// Cart routes
// Order routes
// Admin routes

Route::middleware(['auth:api', 'admin'])->prefix('admin')->group(function () {
    Route::get('orders', [AdminOrderController::class, 'index']);
    Route::put('orders/{order}/status', [AdminOrderController::class, 'updateStatus']);
    Route::get('orders/{order}/print-file', [AdminOrderController::class, 'printFile']);
    Route::get('reports/sales', [AdminOrderController::class, 'salesReport']);
});