<?php

namespace App\Observers;

use App\Models\SeriesInstallment;

class SeriesInstallmentObserver
{
    public function creating(SeriesInstallment $installment)
    {
        $installment->index = $installment->series->installment_count;
    }

    public function deleted(SeriesInstallment $installment)
    {
        $installment->series->reorderInstallments();
    }
}
