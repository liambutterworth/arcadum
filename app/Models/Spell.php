<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Spell extends Model
{
    use HasFactory;

    public function school(): BelongsTo
    {
        return $this->belongsTo(SpellSchool::class);
    }

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(CharacterClass::class);
    }

    public function archetypes()
    {
        return $this->belongsToMany(CharacterClassArchetype::class);
    }
}
