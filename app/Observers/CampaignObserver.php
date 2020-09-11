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
        // $campaign->detach($series);
        // $campaign->episodes()->delete();

        $series->each(function($series) {
            $series->reorderCampaigns();
        });
    }
}
