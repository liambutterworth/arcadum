<?php

namespace App\Models;

use App\Models\Character;
use App\Models\Pantheon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Deity extends Model
{
    use HasFactory;

    public function pantheon(): HasOne
    {
        return $this->hasOne(Pantheon::class);
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}
