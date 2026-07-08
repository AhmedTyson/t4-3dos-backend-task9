<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Enums\UserRole;

class OrderController extends Controller
{
    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json([
                'message' => 'Order not found'
            ], 404);
        }

        $user = auth('api')->user();

        if (
            $user->role !== UserRole::Admin &&
            $order->user_id != $user->id
        ) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        return response()->json($order);
    }
}
public function cancel($id)
{
   
    $order = Order::find($id);

   
    if (!$order) {
        return response()->json([
            'message' => 'Order not found'
        ], 404);
    }

   
    $user = auth('api')->user();

    
    if ($order->user_id != $user->id) {
        return response()->json([
            'message' => 'Unauthorized'
        ], 403);
    }

    
    if ($order->status != 'pending') {
        return response()->json([
            'message' => 'Order cannot be cancelled'
        ], 400);
    }

   
    $order->status = 'cancelled';

  
    $order->save();

   
    return response()->json([
        'message' => 'Order cancelled successfully',
        'order' => $order
    ]);
}