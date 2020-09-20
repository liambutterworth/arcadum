<?php

namespace App\Http\Controllers\Api;

use App\Models\ProficiencyType;
use Illuminate\Http\JsonResponse;

class ProficiencyTypeController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(ProficiencyType::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(ProficiencyType::find($id));
    }

    public function store(): JsonResponse
    {
        ProficiencyType::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        ProficiencyType::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        ProficiencyType::destroy($id);
        return response()->success();
    }
}
