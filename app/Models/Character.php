<?php

namespace App\Models;

use App\Models\Concerns\OwnsProperties;
use App\Models\Concerns\RulesLocations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Collection;

class Character extends Model
{
    use HasFactory, OwnsProperties, RulesLocations;

    protected $guarded = ['id'];

    public function alignment(): BelongsTo
    {
        return $this->belongsTo(Alignment::class);
    }

    public function campaigns(): BelongsToMany
    {
        return $this->belongsToMany(Campaign::class)->using(CampaignMember::class);
    }

    public function classes(): HasMany
    {
        return $this->hasMany(CharacterClass::class);
    }

    public function deity(): BelongsTo
    {
        return $this->belongsTo(Deity::class);
    }

    public function home(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function origin(): BelongsTo
    {
        return $this->belongsTo(Origin::class);
    }

    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
