<?php

namespace Database\Factories;

use App\Models\Alignment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlignmentFactory extends Factory
{
    protected $model = Alignment::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(15),
        ];
    }
}
