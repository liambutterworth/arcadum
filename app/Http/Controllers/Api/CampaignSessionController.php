<?php

namespace App\Http\Controllers\Api;

use App\Models\CampaignSession;
use Illuminate\Http\JsonResponse;

class CampaignSessionController extends Controller
{
    public function index(int $campaignId): JsonResponse
    {
        $sessions = Campaign::with('sessions')->find($campaignId)->sessions;
        return response()->success($sessions);
    }

    public function show(int $campaignId, int $sessiionId): JsonResponse
    {
        return response()->success(CampaignSession::find($session));
    }

    public function store(): JsonResponse
    {
        CampaignSession::create(request()->all());
        return response()->success();
    }

    public function update(int $campaignId, int $sessionId): JsonResponse
    {
        CampaignSession::find($sessionId)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $campaignId, int $sessionId): JsonResponse
    {
        CampaignSession::destroy($sessionId);
        return response()->success();
    }
}
