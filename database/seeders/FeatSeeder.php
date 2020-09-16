<?php

namespace Database\Seeders;

use App\Models\Race;
use App\Models\Feat;
use App\Models\Requirement;
use Illuminate\Database\Seeder;

class FeatSeeder extends Seeder
{
    public function run()
    {
        // feats
        $grappler = Feat::factory()->create([ 'name' => 'Grappler', 'required_stats' => 'strength>13' ]);

        // human feats
        $human = Race::where('name', 'Human')->first();
        $elf = Race::where('name', 'Elf')->first();
        $dragonmarkOfMaking = Feat::factory()->make([ 'name' => 'Dragonmark of Making' ]);
        $human->feats()->save($dragonmarkOfMaking);
        $elf->feats()->save($dragonmarkOfMaking);
    }
}
