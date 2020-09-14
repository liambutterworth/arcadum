<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PartyMember extends Pivot
{
    protected $table = 'party_members';

    public function character(): BelongsTo
    {
        return $this->belongsTo(Character::class);
    }

    public function party(): BelongsTo
    {
        return $this->belongsTo(Party::class);
    }
}
