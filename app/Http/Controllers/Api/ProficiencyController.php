<?php

namespace App\Http\Controllers\Api;

use App\Models\Proficiency;
use Illuminate\Http\JsonResponse;

class ProficiencyController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(Proficiency::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(Proficiency::find($id));
    }

    public function store(): JsonResponse
    {
        Proficiency::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        Proficiency::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        Proficiency::destroy($id);
        return response()->success();
    }
}
