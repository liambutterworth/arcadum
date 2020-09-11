<?php

namespace App\Models;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Collection;

class Series extends Model
{
    use HasFactory;

    /**
     * Campaign relationship
     *
     * @return BelongsToMany
     */
    public function campaigns(): BelongsToMany
    {
        return $this->belongsToMany(Campaign::class)->withPivot('index')->orderBy('campaign_series.index');
    }

    /**
     * Campaign count accessor
     *
     * @return int
     */
    public function getCampaignCountAttribute(): int
    {
        return is_null($this->campaigns) ? 0 : $this->campaigns->count();
    }

    /**
     * Add campaign
     *
     * @param int|Campaign $campaign either an id or model
     * @return Series
     */
    public function addCampaign($campaign): Series
    {
        $this->campaigns()->attach($campaign, [ 'index' => $this->campaign_count ]);
        return $this;
    }

    /**
     * Add multiple campaigns
     *
     * @param array|Collection $campaigns can consist of either ids or models
     * @return Series
     */
    public function addCampaigns($campaigns): Series
    {
        $attach = [];

        foreach ($campaigns as $index => $campaign) {
            $id = $campaign instanceof Campaign ? $campaign->id : $campaign;
            $attach[$id] = [ 'index' => $index + $this->campaign_count ];
        }

        $this->campaigns()->attach($attach);
        return $this;
    }

    /**
     * Reorder campaign indexes
     *
     * @param array|Collection|null $campaigns can consist of either ids or models
     * @return Series
     */
    public function reorderCampaigns($campaigns = null): Series
    {
        if (is_null($campaigns)) {
            $campaigns = $this->campaigns;
        }

        foreach ($campaigns as $index => $campaign) {
            $this->campaigns()->updateExistingPivot($campaign, [ 'index' => $index ]);
        }

        return $this;
    }
}
