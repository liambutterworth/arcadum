<?php

namespace Database\Factories;

use App\Models\MunicipalityDistrct;
use Illuminate\Database\Eloquent\Factories\Factory;

class MunicipalityDistrctFactory extends Factory
{
    protected $model = MunicipalityDistrct::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
        ];
    }
}
