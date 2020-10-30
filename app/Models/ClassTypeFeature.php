<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassTypeFeature extends Pivot
{
    public function archetype(): BelongsTo
    {
        return $this->belongsTo(ClassArchetype::class, 'class_archetype_id');
    }

    public function feature(): BelongsTo
    {
        return $this->belongsTo(Feature::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ClassType::class, 'class_type_id');
    }
}
