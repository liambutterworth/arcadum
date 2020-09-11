<?php

namespace App\Models\Classes;

use App\Models\Character;
use App\Models\Classes\BaseClass;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BaseClassStats extends AbstractClassStats
{
    protected $table = 'character_base_class_stats';

    public function character(): HasOne
    {
        return $this->hasOne(Character::class);
    }

    public function class(): HasOne
    {
        return $this->hasOne(BaseClass::class);
    }
}
