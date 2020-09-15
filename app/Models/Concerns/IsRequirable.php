<?php

namespace App\Models\Concerns;

use App\Models\Requirement;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait IsRequireable
{
    public function requirements(): MorphMany
    {
        return $this->morphMany(Requirement::class, 'requireable');
    }
}
