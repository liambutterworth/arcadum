<?php

namespace App\Models;

use App\Models\Series;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Installment extends MorphPivot
{
    protected $table = 'installments';

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function getNumberAttribute(): int
    {
        return $this->index + 1;
    }
}
