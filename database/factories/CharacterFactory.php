<?php

namespace Database\Factories;

use App\Models\Alignment;
use App\Models\Character;
use App\Models\CharacterClass;
use App\Models\Deity;
use App\Models\Origin;
use App\Models\Race;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    protected $model = Character::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'strength' => $this->faker->numberBetween(1, 20),
            'dexterity' => $this->faker->numberBetween(1, 20),
            'constitution' => $this->faker->numberBetween(1, 20),
            'intelligence' => $this->faker->numberBetween(1, 20),
            'wisdom' => $this->faker->numberBetween(1, 20),
            'charisma' => $this->faker->numberBetween(1, 20),
        ];
    }
}
