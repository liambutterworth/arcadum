<?php

namespace App\Models;

use App\Models\Episode;
use App\Models\Series;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Campaign extends Model
{
    use HasFactory;

    /**
     * Episode relationship
     *
     * @return HasMany
     */
    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class)->orderBy('episodes.index');
    }

    /**
     * Series relationship
     *
     * @return BelongsToMany
     */
    public function series(): BelongsToMany
    {
        return $this->belongsToMany(Series::class);
    }

    public function episodeCount(): int
    {
        return $this->episodes instanceof Collection ? $this->episodes->count() : 0;
    }

    /**
     * Reorder episodes
     *
     * @param array|Collection|null $campaigns can consist of either ids or models
     * @return Campaign
     */
    public function reorderEpisodes($episodes = null): Campaign
    {
        dd('reorder episodes');
        if (is_null($episodes)) {
            $episodes = $this->episodes;
        }

        foreach ($episodes as $index => $episode) {
            $episode = $episode instanceof Episode ? $episode : Episode::find($episode);
            $episode->index = $index;
            $episode->save();
        }

        return $this;
    }
}
