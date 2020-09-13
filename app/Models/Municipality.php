<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipality extends Model
{
    use HasFactory;

    public function region(): HasOne
    {
        return $this->hasOne(Region::class);
    }

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}
