<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Group extends Model
{
    use HasFactory;

    public function category(): BelongsTo
    {
        return $this->belongsTo(GroupCategory::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(GroupType::class);
    }
}