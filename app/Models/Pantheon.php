<?php

namespace App\Models;

use App\Models\Deity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pantheon extends Model
{
    protected $table = 'pantheons';

    public function deities()
    {
        return $this->hasMany(Deity::class);
    }
}
