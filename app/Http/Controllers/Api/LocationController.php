<?php

namespace App\Http\Controllers\Api;

use App\Models\Location;
use Illuminate\Http\JsonResponse;

class LocationController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(Location::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(Location::find($id));
    }

    public function store(): JsonResponse
    {
        Location::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        Location::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        Location::destroy($id);
        return response()->success();
    }
}
