<?php

namespace App\Models;

use App\Models\Classes\BaseClass;
use App\Models\Classes\BaseClassStats;
use App\Models\Classes\PrestigeClass;
use App\Models\Classes\PrestigeClassStats;
use App\Models\Classes\SubClass;
use App\Models\Classes\SubClassStats;
use App\Models\CharacterStats;
use App\Models\Campaign;
use App\Models\Episode;
use App\Models\Deity;
use App\Models\Race;
use App\Support\Alignments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Character extends Model
{
    use HasFactory;

    protected $table = 'characters';

    public function baseClasses(): BelongsToMany
    {
        return $this->belongsToMany(BaseClass::class, 'character_base_class_stats');
    }

    public function baseClassStats(): HasMany
    {
        return $this->hasMany(BaseClassStats::class);
    }

    public function prestigeClasses(): BelongsToMany
    {
        return $this->belongsToMany(PrestigeClass::class, 'character_prestige_class');
    }

    public function prestigeClassStats(): HasMany
    {
        return $this->hasMany(PrestigeClassStats::class);
    }

    public function subClasses(): BelongsToMany
    {
        return $this->belongsToMany(SubClass::class, 'character_sub_class');
    }

    public function subClassStats(): HasMany
    {
        return $this->hasMany(SubClassStats::class);
    }

    public function stats(): HasOne
    {
        return $this->hasOne(CharacterStats::class);
    }

    public function campaigns(): BelongsToMany
    {
        return $this->belongsToMany(Campaign::class, 'campaign_character');
    }

    public function episodes(): HasManyThrough
    {
        return $this->hasManyThrough(Episode::class, Campaign::class);
    }

    public function deity(): HasOne
    {
        return $this->hasOne(Deity::class);
    }

    public function race(): HasOne
    {
        return $this->hasOne(Race::class);
    }
}
