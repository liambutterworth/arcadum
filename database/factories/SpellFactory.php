<?php

namespace Database\Factories;

use App\Models\Spell;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpellFactory extends Factory
{
    protected $model = Spell::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(16),
        ];
    }
}
