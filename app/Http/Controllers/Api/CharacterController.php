<?php

namespace App\Http\Controllers\Api;

use App\Models\Character;
use Illuminate\Http\JsonResponse;

class CharacterController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(Character::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(Character::find($id));
    }

    public function store(): JsonResponse
    {
        Character::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        Character::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        Character::destroy($id);
        return response()->success();
    }
}
