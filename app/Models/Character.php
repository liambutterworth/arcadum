<?php

namespace App\Models;

use App\Models\Classes\BaseClass;
use App\Models\Classes\PrestigeClass;
use App\Models\Classes\SubClass;
use App\Models\Deity;
use App\Models\Race;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Character extends Model
{
    protected $table = 'characters';

    public function baseClasses(): HasManyThrough
    {
        return $this->hasManyThrough(BaseClass::class, 'character_base_class');
    }

    public function prestigeClasses(): HasManyThrough
    {
        return $this->hasManyThrough(PrestigeClass::class, 'character_prestige_class');
    }

    public function subClasses(): HasManyThrough
    {
        return $this->hasManyThrough(SubClass::class, 'character_sub_class');
    }

    public function campaigns(): HasManyThrough
    {
        return $thisd->hasManyThrough(Campaign::class, 'campaign_character');
    }

    public function deity(): HasOne
    {
        return $this->hasOne(Deity::class);
    }

    public function race(): HasOne
    {
        return $this->hasOne(Race::class);
    }
}
