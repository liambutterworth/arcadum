<?php

namespace App\Http\Controllers\Api;

use App\Models\Campaign;
use App\Models\CampaignSession;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CampaignSessionController extends Controller
{
    public function index(int $campaign): Collection
    {
        return Campaign::with('sessions')->find($campaign)->sessions;
    }

    public function show(int $campaign, int $session): CampaignSession
    {
        return CampaignSession::find($session);
    }

    public function store(Request $request): void
    {
        CampaignSession::create($request->all());
    }

    public function update(int $campaign, int $session, Request $request): void
    {
        CampaignSession::find($session)->save($request->all());
    }

    public function destroy(int $campaign, int $session): void
    {
        CampaignSession::destroy($session);
    }
}
