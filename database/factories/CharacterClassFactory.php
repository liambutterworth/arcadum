<?php

namespace Database\Factories;

use App\Models\CharacterClass;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterClassFactory extends Factory
{
    protected $model = CharacterClass::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(24),
        ];
    }
}
