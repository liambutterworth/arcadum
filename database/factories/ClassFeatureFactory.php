<?php

namespace Database\Factories;

use App\Models\ClassFeature;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassFeatureFactory extends Factory
{
    protected $model = ClassFeature::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(24),
        ];
    }
}
