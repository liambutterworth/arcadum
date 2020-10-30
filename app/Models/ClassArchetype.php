<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ClassArchetype extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class)->withPivot('level');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ClassType::class, 'class_type_id');
    }
}
