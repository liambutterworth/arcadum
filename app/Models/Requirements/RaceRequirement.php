<?php

namespace App\Models\Requirements;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class RaceRequirement extends Model implements RequirementInterface
{
    use HasFactory;

    public function requirement(): MorphOne
    {
        return $this->morphOne(Requirement::class, 'requirable');
    }

    public function check(Character $character): bool
    {
        return $character->race_id == $this->race_id;
    }
}
