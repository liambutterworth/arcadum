<?php

namespace App\Observers;

use App\Models\Episode;

class EpisodeObserver
{
    /**
     * Handle the episode "creating" event.
     *
     * @param  \App\Models\Episode  $episode
     * @return void
     */
    public function creating(Episode $episode)
    {
        $episode->index = $episode->campaign->episodeCount();
    }

    /**
     * Handle the episode "deleted" event.
     *
     * @param  \App\Models\Episode  $episode
     * @return void
     */
    public function deleted(Episode $episode)
    {
        $episode->campaign->reorderEpisodes();
    }
}
