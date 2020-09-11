<?php

namespace Database\Factories;

use App\Models\Campaign;
use Carbon\Carbon;
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
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $now = Carbon::now();
        $year = $now->year;
        $month = $this->faker->month();
        $day = $this->faker->dayOfMonth();
        $hour = $this->faker->numberBetween(1, 24);
        $minute = 0;
        $seconds = 0;
        $timezone = 'America/Chicago';
        $scheduled_at = Carbon::create($year, $month, $day, $hour, $minute, $seconds, $timezone);

        return [
            'name' => $this->faker->words(4),
            'description' => $this->faker->text(200),
            'scheduled_interval' => $this->faker->randomElement(Campaign::$schedule_intervals),
            'scheduled_timezone' => $timezone,
            'scheduled_at' => $scheduled_at,
            'started_at' => $this->faker->dateTimeBetween('-2 years', '-1 month'),
            'finished_at' => $this->faker->randomElement([ null, $this->faker->dateTimeBetween('-1 year', 'now') ]),
        ];
    }
}
