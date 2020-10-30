<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feature extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function archetypes(): BelongsToMany
    {
        return $this->belongToMany(ClassArchetype::class)->withPivot('level');
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(ClassType::class)->withPivot('level');
    }
}
