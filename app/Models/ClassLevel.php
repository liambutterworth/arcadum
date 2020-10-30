<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ClassLevel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(ClassType::class);
    }

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(ClassFeature::class);
    }

    public function scopeLevel(int $level, Buidler $query): Builder
    {
        return $query->where('level', $level);
    }
}
