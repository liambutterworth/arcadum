<?php

namespace App\Observers;

use App\Models\CampaignSession;

class CampaignSessionObserver
{
    public function creating(CampaignSession $session)
    {
        $session->index = $session->campaign->sessions()->count();
    }

    public function deleted(CampaignSession $session)
    {
        $session->campaign->reorder();
    }
}
