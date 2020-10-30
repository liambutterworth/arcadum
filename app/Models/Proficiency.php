<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Proficiency extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class);
    }

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(ClassType::class);
    }

    public function organizations(): BelongsToMany
    {
        return $this->belongsToMany(Organization::class);
    }

    public function origins(): BelongsToMany
    {
        return $this->belongsToMany(Origin::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ProficiencyType::class, 'proficiency_type_id');
    }
}
