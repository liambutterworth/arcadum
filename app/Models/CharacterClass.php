<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CharacterClass extends Model
{
    use HasFactory;

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(CharacterClass::class)->using(CharacterClassMaster::class);
    }

    public function archetypes(): HasMany
    {
        return $this->hasMany(CharacterClassArchetype::class);
    }

    public function spells(): BelongsToMany
    {
        return $this->belongsToMany(Spell::class);
    }

    public function feats(): BelongsToMany
    {
        return $this->belongsToMany(Feat::class);
    }
}
