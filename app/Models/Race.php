<?php

namespace App\Models;

use App\Models\Concerns\BelongsToSelf;
use App\Support\Requirable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Race extends Model implements Requirable
{
    use BelongsToSelf, HasFactory;

    public function geneticAncestors(): BelongsToMany
    {
        return $this->belongsToMany(Race::class, null, 'ancestor_id', 'descendent_id');
    }

    public function geneticDescendents(): BelongsToMany
    {
        return $this->belongsToMany(Race::class, null, 'descendent_id', 'ancestor_id');
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    public function feats(): BelongsToMany
    {
        return $this->belongsToMany(Feat::class);
    }

    public function require(): Requirement
    {
        return Requirement::make([
            'key' => 'race_id',
            'operator' => '=',
            'value' => $this->id,
        ]);
    }
}
