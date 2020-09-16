<?php

namespace Database\Factories;

use App\Models\Feat;
use Illuminate\Database\Eloquent\Factories\Factory;

class FeatFactory extends Factory
{
    protected $model = Feat::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(24),
        ];
    }
}
