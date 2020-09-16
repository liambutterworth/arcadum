<?php

namespace Database\Factories;

use App\Models\CharacterClassType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterClassTypeFactory extends Factory
{
    protected $model = CharacterClassType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(24),
        ];
    }
}
