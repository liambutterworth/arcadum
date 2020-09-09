<?php

namespace App\Models\Classes;

use App\Models\Character;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class PrestigeClass extends AbstractClass
{
    protected $table = 'prestige_classes';

    public function character(): HasManyThrough
    {
        return $this->hasManyThrough(Character::class, 'character_prestige_class');
    }
}
