<?php

namespace App\Models;

use App\Models\Campaign;
use App\Models\SeriesInstallment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Series extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function campaigns(): BelongsToMany
    {
        return $this
            ->belongsToMany(Campaign::class, 'series_installments')
            ->using(SeriesInstallment::class)
            ->orderBy('series_installments.index');
    }

    public function installments(): HasMany
    {
        return $this->hasMany(SeriesInstallment::class);
    }

    public function reorder($installments = null): void
    {
        if (is_null($installments)) {
            $installments = $this->campaigns;
        }

        foreach ($installments as $index => $installment) {
            if (!$installment instanceof SeriesInstallment) {
                $installment = SeriesInstallment::find($installment);
            }

            $installment->index = $index;
            $installment->save();
        }
    }
}
