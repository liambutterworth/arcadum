<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeriesInstallment extends MorphPivot
{
    protected $table = 'series_installments';

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function getNumberAttribute(): int
    {
        return $this->index + 1;
    }
}
