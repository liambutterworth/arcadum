<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    use HasFactory, HasRequirements;

    public function school(): BelongsTo
    {
        return $this->belongsTo(SpellSchool::class);
    }
}
