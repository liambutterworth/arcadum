<?php

namespace App\Models\Concerns;

use App\Models\Series;
use App\Models\Installment;

trait HasSeries
{
    public function series()
    {
        return $this->morphToMany(Series::class)->using(Installment::class);
    }

    public function getInstallmentNumberAttribute(): ?int
    {
        return $this->pivot instanceof Installment ? $this->pivot->number : null;
    }
}
