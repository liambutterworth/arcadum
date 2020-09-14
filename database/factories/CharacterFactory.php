<?php

namespace Database\Factories;

use App\Models\Alignment;
use App\Models\Character;
use App\Models\Deity;
use App\Models\Origin;
use App\Models\Race;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    protected $model = Character::class;

    public function configure()
    {
        return $this->afterMaking(function(Character $character) {
            if (!$character->alignment_id) $character->alignment_id = Alignment::inRandomOrder()->first()->id;
            if (!$character->deity_id) $character->deity_id = Deity::inRandomOrder()->first()->id;
            if (!$character->origin_id) $character->origin_id = Origin::inRandomOrder()->first()->id;
            if (!$character->race_id) $character->race_id = Race::inRandomOrder()->first()->id;
            if (!$character->user_id) $character->user_id = User::inRandomOrder()->first()->id;
        });
    }

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
