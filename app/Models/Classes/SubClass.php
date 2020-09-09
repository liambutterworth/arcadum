<?php

namespace App\Models\Classes;

use App\Models\Character;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class SubClass extends AbstractClass
{
    protected $table = 'sub_classes';

    public function characters(): HasManyThrough
    {
        return $this->hasManyThrough(Character::class, 'character_sub_class');
    }
}
