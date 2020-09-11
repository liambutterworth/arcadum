<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Episode;
use App\Models\Series;
use Illuminate\Database\Seeder;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Series::factory()->create([ 'name' => 'Late Night Crew' ])->addCampaigns([
            Campaign::factory()->create([ 'name' => 'Maw of Abbadon' ]),
            Campaign::factory()->create([ 'name' => 'Deals in the Dark' ]),
            Campaign::factory()->create([ 'name' => 'Duality of Dragons' ]),
            Campaign::factory()->create([ 'name' => 'Meaning of Madness' ]),
            Campaign::factory()->create([ 'name' => 'Heart of Tyre' ]),
        ]);
    }
}
