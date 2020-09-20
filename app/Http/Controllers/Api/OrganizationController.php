<?php

namespace App\Http\Controllers\Api;

use App\Models\Organization;
use Illuminate\Http\JsonResponse;

class OrganizationController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(Organization::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(Organization::find($id));
    }

    public function store(): JsonResponse
    {
        Organization::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        Organization::find($id)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        Organization::destroy($id);
        return response()->success();
    }
}
