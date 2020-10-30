<?php

namespace App\Models;

use App\Models\Concerns\HasRequiredAbilities;
// use App\Models\Concerns\ModifiesAbilities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorhpMany;

class Feat extends Model
{
    use HasFactory, HasRequiredAbilities; //, ModifiesAbilities;

    protected $guarded = ['id'];

    public function deities(): BelongsToMany
    {
        return $this->belongsToMany(Deity::class);
    }

    public function origins(): BelongsToMany
    {
        return $this->belongsToMany(Origin::class);
    }

    public function races(): BelongsToMany
    {
        return $this->belongsToMany(Race::class);
    }

    // public function charabilityModifiers()
    // {
    //     return $this->morhpMany(CharacterAbilityModifier::class, 'source');
    // }

    // public static function availableFor(Character $character)
    // {
    //     $query = Feat::with('races')->whereDoesntHave('races');
    //
    //     $query->orWhereHas('races', function($query) use($character) {
    //         $query->where('races.id', $character->race_id);
    //     });
    //
    //     return $query->get()->filter(function($feat) use($character) {
    //         return $feat->hasRequiredAbilities($character);
    //     });
    // }
}
