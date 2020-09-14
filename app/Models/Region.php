<?php

namespace App\Models;

use App\Models\Concerns\BelongsToSelf;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    use BelongsToSelf, HasFactory;

    public function planet(): HasOne
    {
        return $this->hasOne(Planet::class);
    }

    public function capital(): HasOne
    {
        return $this->hasOne(Municipality::class, 'capital_id');
    }

    public function municipalities(): HasMany
    {
        return $this->hasMany(Municipality::class);
    }

    public function origins(): HasMany
    {
        return $this->hasMany(Origin::class);
    }
}
