<?php

namespace App\Http\Controllers\Api;

use App\Models\Pantheon;
use Illuminate\Http\JsonResponse;

class PantheonController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(Pantheon::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(Pantheon::find($id));
    }

    public function store(): JsonResponse
    {
        Pantheon::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        Pantheon::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        Pantheon::destroy($id);
        return response()->success();
    }
}
