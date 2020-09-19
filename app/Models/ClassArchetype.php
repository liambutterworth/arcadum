<?php

namespace App\Models;

use App\Models\Concerns\HasClassFeatures;
use App\Models\Concerns\HasClassLevels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassArchetype extends Model
{
    use HasClassFeatures, HasClassLevels, HasFactory;

    protected $guarded = [
        'id',
    ];

    public function characters(): HasManyThrough
    {
        return $this->hasManyThrough(Character::class, CharacterClass::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ClassType::class, 'class_type_id');
    }
}
