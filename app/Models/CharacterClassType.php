<?php

namespace App\Models;

use App\Models\Concerns\HasLevels;
use App\Support\Requirable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CharacterClassType extends Model implements Requirable
{
    use HasFactory, HasLevels;

    public function archetypes(): HasMany
    {
        return $this->hasMany(CharacterClassArchetype::class);
    }

    public function characterClasses(): HasMany
    {
        return $this->hasMany(CharacterClass::class);
    }
}
