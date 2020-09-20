<?php

namespace App\Http\Controllers\Api;

use App\Models\OrganizationCategory;
use Illuminate\Http\JsonResponse;

class OrganizationCategoryController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(OrganizationCategory::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(OrganizationCategory::find($id));
    }

    public function store(): JsonResponse
    {
        OrganizationCategory::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        OrganizationCategory::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        OrganizationCategory::destroy($id);
        return response()->success();
    }
}
