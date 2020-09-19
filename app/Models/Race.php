<?php

namespace App\Models;

use App\Models\Concerns\BelongsToSelf;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Race extends Model
{
    use BelongsToSelf, HasFactory;

    protected $guarded = [
        'id',
    ];

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    public function feats(): BelongsToMany
    {
        return $this->belongsToMany(Feat::class);
    }
}
