<?php

namespace App\Models;

use App\Models\Concerns\HasLevels;
use App\Models\Concerns\HasRequiredStats;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CharacterClassType extends Model
{
    use HasFactory, HasLevels, HasRequiredStats;

    public function archetypes(): HasMany
    {
        return $this->hasMany(CharacterClassArchetype::class);
    }

    public function characterClasses(): HasMany
    {
        return $this->hasMany(CharacterClass::class);
    }
}
