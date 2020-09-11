<?php

namespace App\Models\Classes;

use App\Models\Character;
use App\Models\Classes\BaseClass;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PrestigeClassStats extends AbstractClassStats
{
    protected $table = 'character_prestige_class_stats';

    public function character(): HasOne
    {
        return $this->hasOne(CharacterClass::class);
    }

    public function class(): HasOne
    {
        return $this->hasOne(PrestigeClass::class);
    }
}
