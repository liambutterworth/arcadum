<?php

namespace Database\Factories;

use App\Models\CampaignSession;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignSessionFactory extends Factory
{
    protected $model = CampaignSession::class;

    public function definition()
    {
        return [
            'name' => $this->faker->text(20),
        ];
    }
}
