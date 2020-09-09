<?php

namespace App\Models;

use App\Models\Character;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class BaseClass extends AbstractClass
{
    protected $table = 'base_classes';

    public function characters(): HasManyThrough
    {
        return $this->hasManyThrough(Character::class, 'character_base_class');
    }
}
