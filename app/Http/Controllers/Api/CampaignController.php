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
        return response()->success(Campaign::with('sessions')->find($id));
    }

    public function store(): JsonResponse
    {
        $campaign = Campaign::create(request()->all());
        return response()->success($campaign);
    }

    public function update(int $id): JsonResponse
    {
        $campaign = Campaign::find($id);
        $request = request();

        if ($request->has('sessions')) {
            $campaign->reorder($request->get('sessions'));
        }

        $campaign->save($request->except('sessions'));
        return response()->success($campaign);
    }

    public function destroy(int $id): JsonResponse
    {
        Campaign::destroy($id);
        return response()->success();
    }
}
