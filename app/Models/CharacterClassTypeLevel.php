<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CharacterClassTypeLevel extends Model
{
    use HasFactory;

    public function type(): BelongsTo
    {
        return $this->belongsTo(CharacterClassType::class, 'type_id');
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(CharacterClassFeature::class, 'character_class_type_level_features', 'feature_id', 'type_id');
    }
}
