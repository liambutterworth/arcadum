<?php

namespace App\Models;

use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Background extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function backgroundable(): MorphTo
    {
        return $this->morphTo();
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    public function proficiencies(): BelongsToMany
    {
        return $this->belongsToMany(Proficiency::class);
    }
}
