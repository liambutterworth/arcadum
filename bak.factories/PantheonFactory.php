<?php

namespace Database\Factories;

use App\Models\Pantheon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PantheonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pantheon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(4),
            'description' => $this->faker->text(200),
        ];
    }
}
