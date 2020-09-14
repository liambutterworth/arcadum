<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CharacterClassMastery extends Model
{
    use HasFactory;

    public function character(): BelongsTo
    {
        return $this->belongsTo(CharacterClass::class);
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(CharacterClass::class);
    }

    public function archetype(): BelongsTo
    {
        return $this->belongsTo(CharacterClassArchetype::class);
    }

    public function spells(): BelongsToMany
    {
        return $this->belongsToMany(Spell::class);
    }
}
