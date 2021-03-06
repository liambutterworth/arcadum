<?php

namespace Database\Factories;

use App\Models\Series;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeriesFactory extends Factory
{
    protected $model = Series::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
        ];
    }
}
