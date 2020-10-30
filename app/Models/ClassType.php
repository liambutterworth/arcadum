<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassType extends Model
{
    use HasFactory;

    public function archetypes(): HasMany
    {
        return $this->hasMany(ClassArchetype::class);
    }

    public function characters(): HasManyThrough
    {
        return $this->hasManyThrough(Character::class, CharacterClass::class);
    }

    public function classes(): HasMany
    {
        return $this->hasMany(CharacterClass::class);
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class)->withPivot('level');
    }

    public function stats(): HasMany
    {
        return $this->hasmany(ClassStats::class);
    }
}
