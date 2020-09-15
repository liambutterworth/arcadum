<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CharacterClassArchetypeLevel extends Model
{
    use HasFactory;

    public function archetype(): BelongsTo
    {
        return $this->belongsTo(CharacterClassArchetype::class, 'archetype_id');
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(CharacterClassFeature::class, 'character_class_archetype_level_features', 'feature_id', 'archetype_id');
    }
}
