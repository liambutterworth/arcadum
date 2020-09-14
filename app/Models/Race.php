<?php

namespace App\Models;

use App\Models\Concerns\BelongsToSelf;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Race extends Model
{
    use BelongsToSelf, HasFactory;

    public function geneticAncestors(): BelongsToMany
    {
        return $this->belongsToMany(Race::class, null, 'ancestor_id', 'descendent_id');
    }

    public function geneticDescendents(): BelongsToMany
    {
        return $this->belongsToMany(Race::class, null, 'descendent_id', 'ancestor_id');
    }
}
