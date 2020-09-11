<?php

namespace App\Models;

use App\Models\Character;
use App\Models\BaseClassStats;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BaseClass extends AbstractClass
{
    protected $table = 'base_classes';

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class, 'character_base_class');
    }

    public function stats(): HasMany
    {
        return $this->hasMany(BaseClassStats::table);
    }
}
