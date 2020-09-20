<?php

namespace Database\Factories;

use App\Models\Origin;
use Illuminate\Database\Eloquent\Factories\Factory;

class OriginFactory extends Factory
{
    protected $model = Origin::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
        ];
    }
}
