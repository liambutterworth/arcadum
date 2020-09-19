<?php

namespace Database\Factories;

use App\Models\SpellType;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpellTypeFactory extends Factory
{
    protected $model = SpellType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(24),
        ];
    }
}
