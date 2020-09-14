<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MunicipalityType extends Model
{
    use HasFactory;

    public function municipalities(): HasMany
    {
        return $this->hasMany(Municipality::class);
    }
}