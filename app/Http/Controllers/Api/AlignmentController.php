<?php

namespace App\Http\Controllers\Api;

use App\Models\Alignment;
use Illuminate\Http\JsonResponse;

class AlignmentController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(Alignment::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(Alignment::find($id));
    }

    public function store(): JsonResponse
    {
        Alignment::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        Alignment::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        Alignment::destroy($id);
        return response()->success();
    }
}
