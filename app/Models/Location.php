<?php

namespace App\Models;

use App\Models\Concerns\BelongsToSelf;
use App\Models\Concerns\HasBackgrounds;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Location extends Model
{
    use BelongsToSelf, HasBackgrounds, HasFactory;

    protected $guarded = [
        'id',
    ];

    public function ruler(): MorphTo
    {
        return $this->morphTo();
    }

    public function capital(): HasOne
    {
        return $this->hasOne(Location::class, 'capital_id');
    }

    public function capitalOf(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'capital_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(LocationType::class, 'location_type_id');
    }
}
