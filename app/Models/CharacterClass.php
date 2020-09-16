<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CharacterClass extends Model
{
    use HasFactory;

    public function character(): BelongsTo
    {
        return $this->belongsTo(Character::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(CharacterClassType::class, 'character_class_type_id');
    }

    public function archetype(): BelongsTo
    {
        return $this->belongsTo(CharacterClassArchetype::class);
    }
}
