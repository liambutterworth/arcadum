<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CharacterClassArchetype extends Model
{
    use HasFactory;

    public function class(): BelongsTo
    {
        return $this->belongsTo(CharacterClass::class);
    }

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class)->using(CharacterClassMastery::class);
    }
}
