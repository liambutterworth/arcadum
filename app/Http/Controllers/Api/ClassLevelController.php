<?php

namespace App\Http\Controllers\Api;

use App\Models\ClassLevel;
use Illuminate\Http\JsonResponse;

class ClassLevelController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(ClassLevel::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(ClassLevel::find($id));
    }

    public function store(): JsonResponse
    {
        ClassLevel::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        ClassLevel::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        ClassLevel::destroy($id);
        return response()->success();
    }
}
