<?php

namespace App\Http\Controllers\Api;

use App\Models\Race;
use Illuminate\Http\JsonResponse;

class RaceController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(Race::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(Race::find($id));
    }

    public function store(): JsonResponse
    {
        Race::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        Race::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        Race::destroy($id);
        return response()->success();
    }
}
