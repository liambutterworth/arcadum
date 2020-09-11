<?php

namespace App\Models;

use App\Models\Character;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CharacterStats extends Model
{
    protected $table = 'character_stats';

    public function character(): HasOne
    {
        return $this->hasOne(Character::class);
    }
}
