<?php

namespace Database\Factories;

use App\Models\CharacterClassTypeLevel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CharacterClassTypeLevelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CharacterClassTypeLevel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'level' => $this->faker->numberBetween(1, 20),
            'proficiency_bonus' => $this->faker->numberBetween(2, 4),
        ];
    }
}
