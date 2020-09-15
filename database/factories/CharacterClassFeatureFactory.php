<?php

namespace Database\Factories;

use App\Models\CharacterClassFeature;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterClassFeatureFactory extends Factory
{
    protected $model = CharacterClassFeature::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(24),
        ];
    }
}
