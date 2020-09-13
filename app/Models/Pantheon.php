<?php

namespace App\Models;

use App\Models\Deity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pantheon extends Model
{
    use HasFactory;

    public function deities(): HasMany
    {
        return $this->hasMany(Deity::class);
    }
}
