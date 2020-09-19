<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProficiencyType extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function proficiencies(): HasMany
    {
        return $this->hasMany(Proficiency::class);
    }
}
