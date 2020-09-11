<?php

namespace App\Models\Classes;

use App\Models\Character;
use App\Models\Classes\SubClassStats;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubClass extends AbstractClass
{
    protected $table = 'sub_classes';

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class, 'character_sub_class');
    }

    public function stats(): HasMany
    {
        return $this->hasMany(SubClassStats::class);
    }
}
