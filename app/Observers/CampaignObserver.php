<?php

namespace App\Observers;

use App\Models\Campaign;

class CampaignObserver
{
    /**
     * Handle the campaign "deleted" event.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return void
     */
    public function deleting(Campaign $campaign)
    {
        $series = $campaign->series;
        $campaign->series()->detach();

        $series->each(function($series) use($campaign) {
            $series->reorderCampaigns();
        });
    }
}
