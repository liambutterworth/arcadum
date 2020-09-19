<?php

namespace Database\Seeders;

use App\Models\Series;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class SeriesSeeder extends Seeder
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
            $slug = Str::of($name)->slug();
            $series = Series::factory()->create([ 'name' => $name ]);

            $campaigns = collect($data['campaigns'])->map(function($slug) {
                return Cache::get("seeders.campaigns.$slug");
            });

            $series->campaigns()->saveMany($campaigns);
            Cache::put("seeders.series.$slug", $series);
        });
    }
}
