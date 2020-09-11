<?php

namespace App\Models;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alignment extends Model
{
    use HasFactory;

    protected $table = 'alignments';

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}
