<?php

namespace Database\Factories;

use App\Models\CharacterClassArchetype;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterClassArchetypeFactory extends Factory
{
    protected $model = CharacterClassArchetype::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(24),
        ];
    }
}
