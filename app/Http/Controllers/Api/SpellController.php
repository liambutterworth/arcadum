<?php

namespace App\Http\Controllers\Api;

use App\Models\Spell;
use Illuminate\Http\JsonResponse;

class SpellController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(Spell::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(Spell::find($id));
    }

    public function store(): JsonResponse
    {
        Spell::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        Spell::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        Spell::destroy($id);
        return response()->success();
    }
}
