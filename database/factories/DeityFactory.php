<?php

namespace Database\Factories;

use App\Models\Deity;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeityFactory extends Factory
{
    protected $model = Deity::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(15),
        ];
    }
}
