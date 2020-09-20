<?php

namespace App\Http\Controllers\Api;

use App\Models\ClassFeature;
use Illuminate\Http\JsonResponse;

class ClassFeatureController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(ClassFeature::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(ClassFeature::find($id));
    }

    public function store(): JsonResponse
    {
        ClassFeature::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        ClassFeature::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        ClassFeature::destroy($id);
        return response()->success();
    }
}
