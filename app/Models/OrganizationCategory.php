<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrganizationCategory extends Model
{
    use HasFactory;

    public function organization(): HasMany
    {
        return $this->belongsTo(Organization::class);
    }
}
