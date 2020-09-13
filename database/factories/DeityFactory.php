<?php

namespace Database\Factories;

use App\Models\Deity;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DeityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Deity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(15),
        ];
    }
}
