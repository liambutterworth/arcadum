<?php

namespace App\Observers;

use App\Models\SeriesInstallment;

class SeriesInstallmentObserver
{
    public function creating(SeriesInstallment $installment): void
    {
        $installment->index = $installment->series->installments()->count();
    }

    public function deleted(SeriesInstallment  $installment): void
    {
        $installment->series->reorder();
    }
}
