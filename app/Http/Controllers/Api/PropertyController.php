<?php

namespace App\Http\Controllers\Api;

use App\Models\Property;
use Illuminate\Http\JsonResponse;

class PropertyController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(Property::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(Property::find($id));
    }

    public function store(): JsonResponse
    {
        Property::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        Property::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        Property::destroy($id);
        return response()->success();
    }
}
