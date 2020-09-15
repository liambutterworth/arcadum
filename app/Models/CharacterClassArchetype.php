<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CharacterClassArchetype extends Model
{
    use HasFactory;

    public function type(): BelongsTo
    {
        return $this->belongsTo(CharacterClassType::class, 'type_id');
    }

    public function levels(): HasMany
    {
        return $this->hasMany(CharacterClassArchetypeLevel::class, 'archetype_id');
    }

    public function level(int $level): ?CharacterClassArchetypeLevel
    {
        return $this->levels()->where('level', $level)->first();
    }
}
