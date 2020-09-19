<?php

namespace App\Models\Concerns;

use App\Models\Background;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasBackgrounds
{
    public function backgrounds(): MorphMany
    {
        return $this->morphMany(Background::class, 'backgroundable');
    }
}
