<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LocationType extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }
}
