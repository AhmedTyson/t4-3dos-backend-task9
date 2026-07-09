<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $category = Category::create($request->validated());

        return response()->json([
            'message' => 'Category created',
            'data'    => $category,
        ], 201);
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'data' => Category::select('id', 'name')->get(),
        ]);
    }
}