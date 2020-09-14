<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    public function run()
    {
        $human = Race::factory()->create([ 'name' => 'Human' ]);
        $variantHuman = Race::factory()->create([ 'name' => 'Variant Human' ]);
        $humanIllithari = Race::factory()->create([ 'name' => 'Human Illiithari' ]);
        $dragon = Race::factory()->create([ 'name' => 'Dragon' ]);
        $changeling = Race::factory()->create([ 'name' => 'Changeling' ]);
        $elf = Race::factory()->create([ 'name' => 'Elf' ]);
        $fey = Race::factory()->create([ 'name' => 'Fey' ]);
        $halfElf = Race::factory()->create([ 'name' => 'Half Elf' ]);
        $halfling = Race::factory()->create([ 'name' => 'Halfling' ]);
        $planeTouched = Race::factory()->create([ 'name' => 'Plane Touched' ]);
        $waterGanasi = Race::factory()->create([ 'name' => 'Water Ganasi' ]);
        $tiefling = Race::factory()->create([ 'name' => 'Tiefling' ]);
        $tieflingAsmodeus = Race::factory()->create([ 'name' => 'Tiefling Asmodeus' ]);
        $tieflingDispatcher = Race::factory()->create([ 'name' => 'Tiefling Dispatcher' ]);

        $human->geneticAncestors()->save($dragon);
        $human->geneticDescendents()->saveMany([ $changeling, $halfElf, $halfling ]);
        $human->children()->saveMany([ $variantHuman, $humanIllithari ]);
        $elf->children()->save($halfElf);
        $fey->children()->save($changeling);
        $planeTouched->children()->saveMany([ $tiefling, $waterGanasi ]);
        $tiefling->children()->saveMany([ $tieflingAsmodeus, $tieflingDispatcher ]);
    }
}
