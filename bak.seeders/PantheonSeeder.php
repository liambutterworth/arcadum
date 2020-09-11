<?php

namespace Database\Seeders;

use App\Models\Deity;
use App\Models\Pantheon;
use Illuminate\Database\Seeder;

class PantheonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pantheon::factory()->create([ 'name' => 'White Pantheon' ])->deities()->saveMany([
            Deity::factory()->create([ 'name' => 'Viderick' ]),
            Deity::factory()->create([ 'name' => 'Vavren' ]),
            Deity::factory()->create([ 'name' => 'Glory' ]),
            Deity::factory()->create([ 'name' => 'Runethares' ]),
            Deity::factory()->create([ 'name' => 'The Seven' ]),
            Deity::factory()->create([ 'name' => 'Grey Pantheon' ]),
            Deity::factory()->create([ 'name' => 'Iass' ]),
            Deity::factory()->create([ 'name' => 'Oun' ]),
            Deity::factory()->create([ 'name' => 'Ezokhine' ]),
            Deity::factory()->create([ 'name' => 'Kaheeli' ]),
            Deity::factory()->create([ 'name' => 'Wondox' ]),
            Deity::factory()->create([ 'name' => 'Sekelcuse' ]),
            Deity::factory()->create([ 'name' => 'Matron of Fate' ]),
            Deity::factory()->create([ 'name' => 'Nero' ]),
        ]);

        Pantheon::factory()->create([ 'name' => 'Midguard Pantheon' ])->deities()->saveMany([
            Deity::factory()->create([ 'name' => 'Odin' ]),
        ]);

        Pantheon::factory()->create([ 'name' => 'Green Pantheon' ])->deities()->saveMany([
            Deity::factory()->create([ 'name' => 'Vinsc' ]),
            Deity::factory()->create([ 'name' => 'Inca' ]),
            Deity::factory()->create([ 'name' => 'Silloway' ]),
            Deity::factory()->create([ 'name' => 'Lorn' ]),
            Deity::factory()->create([ 'name' => 'Gazenaroc' ]),
            Deity::factory()->create([ 'name' => 'Gwaina' ]),
            Deity::factory()->create([ 'name' => 'Talven' ]),
        ]);

        Pantheon::factory()->create([ 'name' => 'Blue Pantheon' ])->deities()->saveMany([
            Deity::factory()->create([ 'name' => 'Tilt' ]),
            Deity::factory()->create([ 'name' => 'Falaael' ]),
            Deity::factory()->create([ 'name' => 'Cassius' ]),
            Deity::factory()->create([ 'name' => 'Astaroth' ]),
            Deity::factory()->create([ 'name' => 'Raquel' ]),
        ]);

        Pantheon::factory()->create([ 'name' => 'Black Pantheon' ])->deities()->saveMany([
            Deity::factory()->create([ 'name' => 'Lorita' ]),
            Deity::factory()->create([ 'name' => "Oloken'hai" ]),
            Deity::factory()->create([ 'name' => 'Wode' ]),
            Deity::factory()->create([ 'name' => 'Babylon' ]),
            Deity::factory()->create([ 'name' => 'Crowley' ]),
        ]);
    }
}
