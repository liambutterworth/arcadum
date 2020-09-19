<?php

namespace App\Models;

use App\Models\Concerns\HasClassFeatures;
use App\Models\Concerns\HasClassLevels;
use App\Models\Concerns\HasRequiredAbilities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ClassType extends Model
{
    use HasClassFeatures, HasClassLevels, HasFactory, HasRequiredAbilities;

    protected $guarded = [
        'id',
    ];

    public function archetypes(): HasMany
    {
        return $this->hasMany(ClassArchetype::class);
    }

    public function characters(): HasManyThrough
    {
        return $this->hasManyThrough(Character::class, CharacterClass::class);
    }

    public function proficiencies(): BelongsToMany
    {
        return $this->belongsToMany(Proficiency::class);
    }

    public function spells(): BelongsToMany
    {
        return $this->belongsToMany(Spell::class);
    }
}
