<?php

namespace App\Models;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Episode extends Model
{
    protected $table = 'episodes';

    public function campaigns(): HasOne;
    {
        return $this->hasOne(Campaign::class);
    }
}
