<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Deity extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function pantheon(): BelongsTo
    {
        return $this->belongsTo(Pantheon::class);
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}
