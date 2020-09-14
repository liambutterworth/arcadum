<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CharacterStats extends Model
{
    use HasFactory;

    public function character(): BelongsTo
    {
        return $this->belongsTo(Character::class);
    }
}
