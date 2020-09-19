<?php

namespace App\Models;

use App\Models\Concerns\OwnsProperties;
use App\Models\Concerns\RulesLocations;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Organization extends Model
{
    use HasFactory, OwnsProperties, RulesLocations;

    protected $guarded = [
        'id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(OrganizationCategory::class, 'organization_category_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(OrganizationType::class, 'organization_type_id');
    }

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class);
    }

    public function proficiencies(): BelongsToMany
    {
        return $this->belongsToMany(Proficiency::class);
    }
}
