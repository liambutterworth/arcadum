<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Origin extends Model
{
    use HasFactory;

    public function originable(): MorphTo
    {
        return $this->morphTo();
    }
}
