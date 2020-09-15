<?php

namespace App\Models;

use App\Models\Concerns\HasRequirements;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feat extends Model
{
    use HasFactory, HasRequirements;
}
