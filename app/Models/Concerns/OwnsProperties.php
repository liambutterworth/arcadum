<?php

namespace App\Models\Concerns;

use App\Models\Property;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait OwnsProperties
{
    public function properties(): MorphMany
    {
        return $this->morphMany(Property::class, 'ownable');
    }
}
