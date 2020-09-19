<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrganizationType extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function organizations(): HasMany
    {
        return $this->hasMany(Organization::class, 'organization_category_id');
    }
}
