<?php

namespace App\Models;

use App\Models\Character;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Race extends Model
{
    protected $table = 'races';

    public function character(): HasOne
    {
        return $this->hasOne(Character::class);
    }
}
