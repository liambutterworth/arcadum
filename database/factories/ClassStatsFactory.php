<?php

namespace Database\Factories;

use App\Models\ClassStats;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClassStatsFactory extends Factory
{
    protected $model = ClassStats::class;

    public function definition()
    {
        return [
            'level' => $this->faker->numberBetween(1, 20),
        ];
    }
}
