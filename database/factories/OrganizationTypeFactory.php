<?php

namespace Database\Factories;

use App\Models\OrganizationType;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationTypeFactory extends Factory
{
    protected $model = OrganizationType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
        ];
    }
}
