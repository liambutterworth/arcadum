<?php

namespace App\Models\Requirements;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Requirement extends Model
{
    public function requiredBy(): MorphTo
    {
        return $this->morphTo('required_by');
    }

    public function requirable(): MorphTo
    {
        return $this->morphTo('requirable');
    }

    public function require($requirement): void
    {
        $this->requirable()->save($requirement);
    }

    public function check(Character $character)
    {
        $this->requirable->check($character);
    }
}
