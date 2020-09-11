<?php

namespace App\Models;

use App\Models\Character;
use App\Models\Classes\PrestigeClassStats;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PrestigeClass extends AbstractClass
{
    protected $table = 'prestige_classes';

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class, 'character_prestige_class');
    }

    public function stats(): HasMany
    {
        return $this->hasMany(PrestigeClassStats::class);
    }
}
