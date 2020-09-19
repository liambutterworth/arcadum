<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTomany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ClassFeature extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class);
    }

    public function featurable(): MorphTo
    {
        return $this->morphTo();
    }
}
