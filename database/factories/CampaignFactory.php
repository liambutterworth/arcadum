<?php

namespace Database\Factories;

use App\Models\Campaign;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CampaignFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campaign::class;

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function(Campaign $campaign) {
            $episodes = Episode::factory()->count(5)->make();

            $episodes->each(function($episodes, $index) {
                $episodes->index = $index;
            });

            $campaign->episodes()->saveMany($episodes);
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(4),
        ];
    }
}
