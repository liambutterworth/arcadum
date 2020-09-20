<?php

namespace App\Http\Controllers\Api;

use App\Models\SpellSchool;
use Illuminate\Http\JsonResponse;

class SpellSchoolController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(SpellSchool::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(SpellSchool::find($id));
    }

    public function store(): JsonResponse
    {
        SpellSchool::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        SpellSchool::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        SpellSchool::destroy($id);
        return response()->success();
    }
}
