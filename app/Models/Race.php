<?php

namespace App\Models;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Race extends Model
{
    use HasFactory;

    protected $table = 'races';

    public function ancestors(): BelongsToMany
    {
        return $this->belongsToMany(Race::class, 'race_ancestry', 'descendent_id', 'ancestor_id');
    }

    public function descendents(): BelongsToMany
    {
        return $this->belongsToMany(Race::class, 'race_ancestry', 'ancestor_id', 'descendent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Race::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Race::class, 'parent_id');
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}
