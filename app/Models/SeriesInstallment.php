<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeriesInstallment extends Pivot
{
    protected $table = 'series_installments';
    protected $appends = ['number'];
    protected $guarded = ['id'];

    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class);
    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }

    public function getNumberAttribute(): int
    {
        return $this->index + 1;
    }
}
