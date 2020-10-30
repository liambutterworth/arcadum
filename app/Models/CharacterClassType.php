<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class CharacterClassType extends Pivot
{
    protected $table = 'character_class_type';
    public $incrementing = true;

    public function archetype(): BelongsTo
    {
        return $this->belongsTo(ClassArchetype::class, 'class_archetype_id');
    }

    public function character(): BelongsTo
    {
        return $this->belongsTo(Character::class);
    }

    public function features(): HasManyThrough
    {
        return $this->hasManyThrough(ClassTypeFeature::class, ClassType::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ClassType::class, 'class_type_id');
    }
}
