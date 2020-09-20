<?php

namespace App\Http\Controllers\Api;

use App\Models\ClassArchetype;
use Illuminate\Http\JsonResponse;

class ClassArchetypeController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(ClassArchetype::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(ClassArchetype::find($id));
    }

    public function store(): JsonResponse
    {
        ClassArchetype::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        ClassArchetype::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        ClassArchetype::destroy($id);
        return response()->success();
    }
}
