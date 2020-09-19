<?php

namespace Database\Factories;

use App\Models\ClassLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassLevelFactory extends Factory
{
    protected $model = ClassLevel::class;

    public function definition()
    {
        return [
            'level' => $this->faker->numberBetween(1, 20),
        ];
    }
}
