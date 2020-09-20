<?php

namespace App\Http\Controllers\Api;

use App\Models\LocationType;
use Illuminate\Http\JsonResponse;

class LocationTypeController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(LocationType::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(LocationType::find($id));
    }

    public function store(): JsonResponse
    {
        LocationType::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        LocationType::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        LocationType::destroy($id);
        return response()->success();
    }
}
