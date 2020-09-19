<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class);
    }

    public function series(): BelongsToMany
    {
        return $this->belongsToMany(Series::class, 'series_installments')->using(SeriesInstallment::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(CampaignSession::class);
    }

    public function reorder($sessions = null): void
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
