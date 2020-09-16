<?php

namespace Database\Factories;

use App\Models\CharacterClass;
use App\Models\CharacterClassType;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterClassFactory extends Factory
{
    protected $model = CharacterClass::class;

    public function configure()
    {
        return $this->afterMaking(function(CharacterClass $class) {
            if (!$class->type) $class->type()->associate(CharacterClassType::inRandomOrder()->first());
        });
    }

    public function definition()
    {
        return [
            'level' => $this->faker->numberBetween(1, 10),
        ];
    }
}
