<?php

namespace App\Models\Concerns;

use App\Models\Location;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait RulesLocations
{
    public function rules(): MorphMany
    {
        return $this->morphMany(Location::class, 'ruler');
    }
}
