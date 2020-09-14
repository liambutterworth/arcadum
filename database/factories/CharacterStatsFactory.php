<?php

namespace Database\Factories;

use App\Models\CharacterStats;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterStatsFactory extends Factory
{
    protected $model = CharacterStats::class;

    public function definition()
    {
        return [
            'strength' => $this->faker->numberBetween(1, 20),
            'dexterity' => $this->faker->numberBetween(1, 20),
            'constitution' => $this->faker->numberBetween(1, 20),
            'intelligence' => $this->faker->numberBetween(1, 20),
            'wisdom' => $this->faker->numberBetween(1, 20),
            'charisma' => $this->faker->numberBetween(1, 20),
        ];
    }
}
