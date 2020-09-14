<?php

namespace App\Models;

use App\Models\Concerns\HasSeries;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Campaign extends Model
{
    use HasFactory, HasSeries;

    public function party(): HasOne
    {
        return $this->hasOne(Party::class);
    }

    public function members(): HasManyThrough
    {
        return $this->hasManyThrough(PartyMember::class, Party::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(CampaignSession::class)->orderBy('campaign_sessions.index');
    }

    public function getPartyAttribute(): Party
    {
        return Party::firstOrCreate([ 'campaign_id' => $this->id ]);
    }

    public function getSessionCountAttribute(): int
    {
        return is_null($this->sessions) ? 0 : $this->sessions->count();
    }

    public function reorderSessions(?array $sessions = null): void
    {
        if (is_null($sessions)) {
            $sessions = $this->sessions;
        }

        foreach ($sessions as $index => $session) {
            if (!$session instanceof CampaignSession) {
                $session = CampaignSession::find($session);
            }

            $session->index = $index;
            $session->save();
        }
    }
}
