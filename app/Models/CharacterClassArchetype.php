<?php

namespace App\Models;

use App\Models\Concerns\HasLevels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CharacterClassArchetype extends Model
{
    use HasFactory, HasLevels;

    public function type(): BelongsTo
    {
        return $this->belongsTo(CharacterClassType::class);
    }
}
