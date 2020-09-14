<?php

namespace App\Models;

use App\Models\Campaign;
use App\Models\SeriesInstallment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Series extends Model
{
    use HasFactory;

    public function serializableMorphToMany(string $class): MorphToMany
    {
        return $this
            ->morphedByMany($class, 'serializable', 'series_installments')
            ->withPivot('index')
            ->using(SeriesInstallment::class)
            ->orderBy('series_installments.index');
    }

    public function campaigns(): MorphToMany
    {
        return $this->serializableMorphToMany(Campaign::class);
    }

    public function installments(): HasMany
    {
        return $this->hasMany(SeriesInstallment::class);
    }

    public function getInstallmentCountAttribute(): int
    {
        return is_null($this->installments) ? 0 : $this->installments->count();
    }

    public function reorderInstallments(?array $installments = null): Series
    {
        if (is_null($installments)) {
            $installments = $this->installments->pluck('id');
        }

        foreach ($installments as $index => $installment) {
            if (!$installment instanceof SeriesInstallment) {
                $installment = SeriesInstallment::find($installment);
            }

            $installment->index = $index;
            $installment->save();
        }

        return $this;
    }
}
