<?php

namespace Database\Seeders;

use App\Models\Series;

class SeriesSeeder extends ResourceSeeder
{
    public function run()
    {
        $this->create([
            'Late Night Crew' => [ 'campaigns' => ['maw-of-abbadon', 'deals-in-the-dark'] ],
            'Scattered Clowns' => [ 'campaigns' => ['shattered-crowns', 'shattered-crowns-s2'] ],
        ]);
    }

    public function create(array $series): void
    {
        collect($series)->each(function(array $data, string $name) {
            $series = Series::factory()->create([ 'name' => $name ]);
            $campaigns = $this->getMany('campaigns', $data['campaigns']);
            $series->campaigns()->saveMany($campaigns);
            $this->set('series', $name, $series);
        });
    }
}
