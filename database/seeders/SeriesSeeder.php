<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Series;
use Illuminate\Database\Seeder;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Series::factory()->create([ 'name' => 'Late Night Crew' ])->campaigns()->saveMany([
            Campaign::factory()->make([ 'name' => 'Maw of Abbadon' ]),
            Campaign::factory()->make([ 'name' => 'Deals in the Dark' ]),
            Campaign::factory()->make([ 'name' => 'Duality of Dragons' ]),
            Campaign::factory()->make([ 'name' => 'Meaning of Madness' ]),
            Campaign::factory()->make([ 'name' => 'Heart of Tyre' ]),
        ]);

        Series::factory()->create([ 'name' => 'Scattered Clowns' ])->campaigns()->saveMany([
            Campaign::factory()->make([ 'name' => 'Shattered Crowns' ]),
            Campaign::factory()->make([ 'name' => 'Shattered Crowns Season 2' ]),
        ]);
    }
}
