<?php

namespace App\Http\Controllers\Api;

use App\Models\OrganizationType;
use Illuminate\Http\JsonResponse;

class OrganizationTypeController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(OrganizationType::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(OrganizationType::find($id));
    }

    public function store(): JsonResponse
    {
        OrganizationType::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        OrganizationType::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        OrganizationType::destroy($id);
        return response()->success();
    }
}
