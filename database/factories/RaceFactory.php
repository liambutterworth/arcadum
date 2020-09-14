<?php

namespace Database\Factories;

use App\Models\Race;
use Illuminate\Database\Eloquent\Factories\Factory;

class RaceFactory extends Factory
{
    protected $model = Race::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(15),
        ];
    }
}
