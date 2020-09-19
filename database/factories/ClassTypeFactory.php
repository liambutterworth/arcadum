<?php

namespace Database\Factories;

use App\Models\ClassType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassTypeFactory extends Factory
{
    protected $model = ClassType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(24),
        ];
    }
}
