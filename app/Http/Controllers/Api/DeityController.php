<?php

namespace App\Http\Controllers\Api;

use App\Models\Deity;
use Illuminate\Http\JsonResponse;

class DeityController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(Deity::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(Deity::find($id));
    }

    public function store(): JsonResponse
    {
        Deity::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        Deity::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        Deity::destroy($id);
        return response()->success();
    }
}
