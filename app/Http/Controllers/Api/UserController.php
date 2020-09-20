<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(User::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(User::find($id));
    }

    public function store(): JsonResponse
    {
        User::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        User::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        User::destroy($id);
        return response()->success();
    }
}
