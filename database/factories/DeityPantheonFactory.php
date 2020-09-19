<?php

namespace Database\Factories;

use App\Models\DeityPantheon;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeityPantheonFactory extends Factory
{
    protected $model = DeityPantheon::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(15),
        ];
    }
}
