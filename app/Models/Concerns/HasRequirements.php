<?php

namespace App\Models\Concerns;

use App\Models\Requirements\Requirement;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasRequirements
{
    public function requirements(): MorphMany
    {
        return $this->morphMany(Requirement::class, 'required_by');
    }

    public function requirementsMetBy(Character $character): bool
    {
        foreach ($this->requirements as $requirement) {
            if (!$requirement->check($character)) {
                return false;
            }
        }

        return true;
    }
}
