<?php

namespace App\Models;

use App\Models\Character;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Campaign extends Model
{
    protected $table = 'campaigns';

    public function characters(): HasManyThrough
    {
        return $this->hasManyThrough(Character::class, 'campaign_character');
    }

    public function episodes(): HasMany
    {
        return $this->hasMany(Episode::class);
    }
}
