<?php

namespace Database\Factories;

use App\Models\SpellSchool;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpellSchoolFactory extends Factory
{
    protected $model = SpellSchool::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(16),
        ];
    }
}
