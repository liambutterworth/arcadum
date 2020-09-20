<?php

namespace App\Http\Controllers\Api;

use App\Models\ClassType;
use Illuminate\Http\JsonResponse;

class ClassTypeController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(ClassType::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(ClassType::find($id));
    }

    public function store(): JsonResponse
    {
        ClassType::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        ClassType::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        ClassType::destroy($id);
        return response()->success();
    }
}
