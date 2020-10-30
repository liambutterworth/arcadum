<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClassStats extends Model
{
    use HasFactory;

    public function type(): BelongsToMany
    {
        return $this->belongsTo(ClassType::class);
    }
}
