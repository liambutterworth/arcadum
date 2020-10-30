<?php

namespace App\Models;

use App\Models\Concerns\BelongsToSelf;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Origin extends Model
{
    use BelongsToSelf, HasFactory;

    protected $guarded = ['id'];

    public function originable(): MorphTo
    {
        return $this->morphTo();
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    public function feats(): BelongsToMany
    {
        return $this->belongsToMany(Feat::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function proficiencies(): BelongsToMany
    {
        return $this->belongsToMany(Proficiency::class);
    }
}
