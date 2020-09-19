<?php

namespace Database\Factories;

use App\Models\Proficiency;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProficiencyFactory extends Factory
{
    protected $model = Proficiency::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(24),
        ];
    }
}
