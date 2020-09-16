<?php

namespace App\Models\Concerns;

use App\Models\Character;

trait HasRequiredStats
{
    public function hasRequiredStats(Character $character): bool
    {
        if (is_null($this->stats_requirement)) return true;

        
    }
}
