<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class AdminUserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::where('role', UserRole::Customer)->paginate(15);

        return response()->json([
            'message' => 'Customers fetched successfully',
            'data'    => UserResource::collection($users)->response()->getData(true),
        ]);
    }
}
