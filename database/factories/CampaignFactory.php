<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\CampaignSession;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    protected $model = Campaign::class;

    public function configure()
    {
        return $this->afterCreating(function(Campaign $campaign) {
            $sessions = CampaignSession::factory()->count(rand(4, 12))->make();
            $campaign->sessions()->saveMany($sessions);
        });
    }

    public function definition()
    {
        return [
            'name' => $this->faker->words(4),
        ];
    }
}
