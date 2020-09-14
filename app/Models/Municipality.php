<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Municipality extends Model
{
    use HasFactory;

    public function type(): BelongsTo
    {
        return $this->belongsTo(MunicipalityType::class);
    }

    public function capitalOf(): BelongsTo
    {
        return $this->belongsTo(Region::class, 'capital_id');
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function districts(): HasMany
    {
        return $this->hasMany(District::class);
    }
}
