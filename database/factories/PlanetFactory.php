<?php

namespace Database\Factories;

use App\Models\Planet;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanetFactory extends Factory
{
    protected $model = Planet::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(16),
        ];
    }
}
