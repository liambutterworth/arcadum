<?php

namespace App\Http\Controllers\Api;

use App\Models\Campaign;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index()
    {
        return Campaign::all();
    }

    public function show(Campaign $campaign)
    {
        return $campaign;
    }

    public function store(Request $request)
    {
        Campaign::create($request->all());
    }

    public function update(Request $request, Campaign $campaign)
    {
        $campaign->save($request->all());
    }

    public function delete(Request $request, Campaign $campaign)
    {
        $campaign->delete();
    }
}
