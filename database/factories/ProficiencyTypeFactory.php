<?php

namespace Database\Factories;

use App\Models\ProficiencyType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProficiencyTypeFactory extends Factory
{
    protected $model = ProficiencyType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(24),
        ];
    }
}
