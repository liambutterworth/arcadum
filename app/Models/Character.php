<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Character extends Model
{
    use HasFactory;

    public function stats(): HasOne
    {
        return $this->hasOne(CharacterStats::class);
    }

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(CharacterClass::class)->using(CharacterClassMastery::class);
    }

    public function parties(): BelongsToMany
    {
        return $this->belongsToMany(Party::class, 'party_members')->using(PartyMember::class);
    }
}
