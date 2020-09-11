<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brokenBonds = Campaign::factory()->create([ 'name' => 'Broken Bonds' ]);
        $shatteredCrowns = Campaign::factory()->create([ 'name' => 'Shattered Crowns' ]);
        $shatteredCrownsS2 = Campaign::factory()->create([ 'name' => 'Shattered Crowns S2' ]);
        $gamblersDelight = Campaign::factory()->create([ 'name' => "Gambler's Delight" ]);
        $shadowOfTyre = Campaign::factory()->create([ 'name' => 'Shadow of Tyre' ]);
        $dealsInTheDark = Campaign::factory()->create([ 'name' => 'Deals in the Dark' ]);
        $mawOfAbbadon = Campaign::factory()->create([ 'name' => 'Maw of Abbadon' ]);
        $dualityOfDragons = Campaign::factory()->create([ 'name' => 'Duality of Dragons' ]);
        $meaningOfMadness = Campaign::factory()->create([ 'name' => 'Meaning of Madness' ]);
        $heartOfTyre = Campaign::factory()->create([ 'name' => 'Heart of Tyre' ]);

        // $gamblersDelight->sequel()->associate($shadowOfTyre)->save();
        // $shatteredCrownsS2->prequel()->associate($shatteredCrowns)->save();
        // $dealsInTheDark->sequel()->associate($mawOfAbbadon)->save();
        // $mawOfAbbadon->sequel()->associate($dualityOfDragons)->save();
        // $dualityOfDragons->sequel()->associate($meaningOfMadness)->save();
        // $meaningOfMadness->sequel()->associate($heartOfTyre)->save();
    }
}
