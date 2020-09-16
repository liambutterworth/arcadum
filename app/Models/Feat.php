<?php

namespace App\Models;

use App\Models\Concerns\HasRequiredStats;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feat extends Model
{
    use HasFactory, HasRequiredStats;

    public function races(): BelongsToMany
    {
        return $this->belongsToMany(Race::class);
    }

    public static function availableFor(Character $character)
    {
        $query = Feat::with('races');
        $query->whereDoesntHave('races');
        
        $query->orWhereHas('races', function($query) use($character) {
            $query->where('races.id', $character->race_id);
        });

        return $query->get()->filter(function($feat) use($character) {
            return $feat->hasRequiredStats($character);
        });
    }
}
