<?php

namespace App\Models\Concerns;

use App\Models\ClassFeature;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasClassFeatures
{
    public function features(): MorphMany
    {
        return $this->morphMany(ClassFeature::class, 'featurable');
    }
}
