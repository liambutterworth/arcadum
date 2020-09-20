<?php

namespace App\Models;

use App\Models\Concerns\HasRequiredAbilities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feat extends Model
{
    use HasFactory, HasRequiredAbilities;

    protected $guarded = ['id'];

    public function races(): BelongsToMany
    {
        return $this->belongsToMany(Race::class);
    }

    public function origins(): BelongsToMany
    {
        return $this->belongsToMany(Origin::class);
    }

    public static function availableFor(Character $character)
    {
        $query = Feat::with('races')->whereDoesntHave('races');

        $query->orWhereHas('races', function($query) use($character) {
            $query->where('races.id', $character->race_id);
        });

        return $query->get()->filter(function($feat) use($character) {
            return $feat->hasRequiredAbilities($character);
        });
    }
}
