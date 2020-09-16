<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Character extends Model
{
    use HasFactory;

    public function stats(): HasOne
    {
        return $this->hasOne(CharacterStats::class);
    }

    public function classes(): HasMany
    {
        return $this->hasMany(CharacterClass::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }

    public function origin(): BelongsTo
    {
        return $this->belongsTo(Origin::class);
    }

    public function deity(): BelongsTo
    {
        return $this->belongsTo(Deity::class);
    }

    public function alignment(): BelongsTo
    {
        return $this->belongsTo(Alignment::class);
    }

    public function parties(): BelongsToMany
    {
        return $this->belongsToMany(Party::class, 'party_members')->using(PartyMember::class);
    }

    public function getAvailableFeats()
    {
        return Feat::getAvailableFor($this);
    }

    public function getAvailableClassees()
    {
        return CharacterClassType::all()->filter(function($type) {
            // $type->
        });
    }
}
