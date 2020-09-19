<?php

namespace Database\Factories;

use App\Models\Background;
use Illuminate\Database\Eloquent\Factories\Factory;

class BackgroundFactory extends Factory
{
    protected $model = Background::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
        ];
    }
}
