<?php

namespace Database\Factories;

use App\Models\Pantheon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PantheonFactory extends Factory
{
    protected $model = Pantheon::class;

    public function definition()
    {
        return [
            'name' => $this->faker->words(15),
        ];
    }
}
