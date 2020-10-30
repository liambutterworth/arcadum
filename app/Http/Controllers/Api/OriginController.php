<?php

namespace App\Http\Controllers\Api;

use App\Models\Origin;
use Illuminate\Http\JsonResponse;

class OriginController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(Origin::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(Origin::find($id));
    }

    public function store(): JsonResponse
    {
        Origin::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        Origin::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        Origin::destroy($id);
        return response()->success();
    }
}
