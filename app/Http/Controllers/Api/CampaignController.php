<?php

namespace App\Http\Controllers\Api;

use App\Models\Campaign;
use Illuminate\Http\JsonResponse;

class CampaignController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(Campaign::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(Campaign::find($id));
    }

    public function store(): JsonResponse
    {
        Campaign::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        $campaign = Campaign::find($id);
        $request = request();

        if ($request->has('sessions')) {
            $campaign->reorder($request->get('sessions'));
        }

        $campaign->save($request->except('sessions'));
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        Campaign::destroy($id);
        return response()->success();
    }
}
