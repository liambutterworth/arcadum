<?php

namespace App\Observers;

use App\Models\Installment;

class InstallmentObserver
{
    public function creating(Installment $installment)
    {
        $installment->index = $installment->series->installment_count;
    }

    public function deleted(Installment $installment)
    {
        $installment->series->reorderInstallments();
    }
}
