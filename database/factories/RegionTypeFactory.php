<?php

namespace Database\Factories;

use App\Models\RegionType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegionTypeFactory extends Factory
{
    protected $model = RegionType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(12),
        ];
    }
}
