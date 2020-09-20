<?php

namespace App\Http\Controllers\Api;

use App\Models\DeityPantheon;
use Illuminate\Http\JsonResponse;

class DeityPantheonController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(DeityPantheon::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(DeityPantheon::find($id));
    }

    public function store(): JsonResponse
    {
        DeityPantheon::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        DeityPantheon::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        DeityPantheon::destroy($id);
        return response()->success();
    }
}
