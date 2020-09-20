<?php

namespace App\Http\Controllers\Api;

use App\Models\Feat;
use Illuminate\Http\JsonResponse;

class FeatController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(Feat::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(Feat::find($id));
    }

    public function store(): JsonResponse
    {
        Feat::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        Feat::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        Feat::destroy($id);
        return response()->success();
    }
}
