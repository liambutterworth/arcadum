<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $human = Race::factory()->create([ 'name' => 'Human', 'is_playable' => true ]);
        $variantHuman = Race::factory()->create([ 'name' => 'Variant Human' , 'is_playable' => true ]);
        $humanIllithari = Race::factory()->create([ 'name' => 'Human Illiithari', 'is_playable' => true ]);
        $dragon = Race::factory()->create([ 'name' => 'Dragon', 'is_playable' => false ]);
        $changeling = Race::factory()->create([ 'name' => 'Changeling', 'is_playable' => true ]);
        $halfElf = Race::factory()->create([ 'name' => 'Half Elf', 'is_playable' => true ]);
        $halfling = Race::factory()->create([ 'name' => 'Halfling', 'is_playable' => true ]);
        $human->ancestors()->save($dragon);
        $human->descendents()->saveMany([ $changeling, $halfElf, $halfling ]);
        $human->children()->saveMany([ $variantHuman, $humanIllithari ]);
    }
}
