<?php

namespace Database\Factories;

use App\Models\ClassArchetype;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassArchetypeFactory extends Factory
{
    protected $model = ClassArchetype::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(24),
        ];
    }
}
