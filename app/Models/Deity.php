<?php

namespace App\Models;

use App\Models\Character;
use App\Models\Pantheon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Deity extends Model
{
    protected $table = 'deities';

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    public function pantheon(): HasOne
    {
        return $this->hasOne(Pantheon::class);
    }
}
