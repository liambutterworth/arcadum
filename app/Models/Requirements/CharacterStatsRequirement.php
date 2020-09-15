<?php

namespace App\Models\Requirements;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class CharacterStatsRequirement extends Model implements RequirementInterface
{
    use HasFactory;

    public function requirement(): MorphOne
    {
        return $this->morphOne(Requirement::class, 'requirable');
    }

    public function check(Character $character): bool
    {
        return $character->stats->{$this->stat_name} >= $this->stat_value;
    }
}
