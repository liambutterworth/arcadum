<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;

class CharacterClassFeature extends Model
{
    use HasFactory;

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(CharacterClassType::class)->using(CharacterClassTypeLevel::class);
    }

    public function typeLevels(): BelongsToMany
    {
        return $this->belongsToMany(CharacterClassTypeLevel::class, 'character_class_type_level_features', 'type_id', 'feature_id');
    }

    public function archetypes(): BelongsToMany
    {
        return $this->belongsToMany(CharacterClassArchetype::class)->using(CharacterClassArchetypeLevel::class);
    }

    public function archetypeLevels(): BelongsToMany
    {
        return $this->belongsToMany(CharacterClassArchetypeLevel::class, 'character_class_archetype_level_features', 'archetype_id', 'feature_id');
    }

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(CharacterClass::class);
    }

    public function scopeRacial(Builder $query): Builder
    {
        return $query->has(Race::class);
    }
}
