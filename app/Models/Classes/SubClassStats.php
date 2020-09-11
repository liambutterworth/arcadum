<?php

namespace App\Models\Classes;

use App\Models\Character;
use App\Models\Classes\SubClass;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CharacterSubClass extends AbstractCharacterClass
{
    protected $table = 'character_sub_class_stats';

    public function character(): HasOne
    {
        return $this->hasOne(Character::class);
    }

    public function class(): HasOne
    {
        return $this->hasOne(SubClass::class);
    }
}
