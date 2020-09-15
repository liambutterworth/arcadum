<?php

namespace App\Models\Requirements;

use App\Models\Character;
use Illuminate\Database\Eloquent\Relations\MorphOne;

interface RequirementInterface
{
    public function requirement(): MorphOne;
    public function check(Character $character): bool;
}
