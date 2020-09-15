<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CharacterClassType extends Model
{
    use HasFactory;

    public function archetypes(): HasMany
    {
        return $this->hasMany(CharacterClassArchetype::class, 'type_id');
    }

    public function levels(): HasMany
    {
        return $this->hasMany(CharacterClassTypeLevel::class, 'type_id');
    }

    public function level(int $level): ?CharacterClassTypeLevel
    {
        return $this->levels()->where('level', $level)->first();
    }
}
