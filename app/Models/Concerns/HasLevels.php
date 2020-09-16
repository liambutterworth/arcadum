<?php

namespace App\Models\Concerns;

use App\Models\Level;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasLevels
{
    public function levels(): MorphMany
    {
        return $this->morphMany(Level::class, 'levelable');
    }

    public function level(int $level): ?Level
    {
        return $this->levels()->where('level', $level)->first();
    }
}
