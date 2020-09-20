<?php

namespace App\Http\Controllers\Api;

use App\Models\SpellType;
use Illuminate\Http\JsonResponse;

class SpellTypeController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(SpellType::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(SpellType::find($id));
    }

    public function store(): JsonResponse
    {
        SpellType::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        SpellType::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        SpellType::destroy($id);
        return response()->success();
    }
}
