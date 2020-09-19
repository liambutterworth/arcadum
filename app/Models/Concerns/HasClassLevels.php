<?php

namespace App\Models\Concerns;

use App\Models\ClassLevel;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasClassLevels
{
    public function levels(): MorphMany
    {
        return $this->morphMany(ClassLevel::class, 'levelable');
    }

    public function getLevel(int $level): ?ClassLevel
    {
        return $this->levels()->where('level', $level)->first();
    }
}
