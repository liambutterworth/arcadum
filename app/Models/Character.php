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

    protected $guarded = [
        'id',
    ];

    public function alignment(): BelongsTo
    {
        return $this->belongsTo(Alignment::class);
    }

    public function background(): BelongsTo
    {
        return $this->belongsTo(Background::class);
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

    public function features(): BelongsToMany
    {
        return $this->belongsToMany(ClassFeature::class);
    }

    public function organizations(): BelongsToMany
    {
        return $this->belongsToMany(Organization::class)->using(OrganizationMember::class);
    }

    public function origin(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function proficiences(): BelongsToMany
    {
        return $this->belongsToMany(Proficiency::class);
    }

    public function race(): BelongsTo
    {
        return $this->belongsTo(Race::class);
    }

    public function spells(): BelongsToMany
    {
        return $this->belongsToMany(Spell::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getAvailableFeats(): Collection
    {
        //
    }

    public function getAvailableClassFeatures(): Collection
    {
        $features = new Collect();

        $this->character->classes->each(function($class) use(&$features) {
            $features->concat($class->type->features()->where('level_requirement', '<=', $class->level)->get());

            if ($class->archetype) {
                $features->concat($class->archetype->features()->where('level_requirement', '<=', $class->level)->get());
            }
        });

        return $features;
    }
}
