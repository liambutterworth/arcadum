<?php

namespace Database\Seeders;

use App\Models\Deity;
use App\Models\Pantheon;
use Illuminate\Database\Seeder;

class PantheonSeeder extends Seeder
{
    public function run()
    {
        Pantheon::factory()->create([ 'name' => 'White Pantheon' ])->deities()->saveMany([
            Deity::factory()->make([ 'name' => 'Viderick' ]),
            Deity::factory()->make([ 'name' => 'Vavren' ]),
            Deity::factory()->make([ 'name' => 'Glory' ]),
            Deity::factory()->make([ 'name' => 'Runethares' ]),
            Deity::factory()->make([ 'name' => 'The Seven' ]),
        ]);

        Pantheon::factory()->create([ 'name' => 'Grey Pantheon' ])->deities()->saveMany([
            Deity::factory()->make([ 'name' => 'Iass' ]),
            Deity::factory()->make([ 'name' => 'Oun' ]),
            Deity::factory()->make([ 'name' => 'Ezokhine' ]),
            Deity::factory()->make([ 'name' => 'Kaheeli' ]),
            Deity::factory()->make([ 'name' => 'Wondox' ]),
            Deity::factory()->make([ 'name' => 'Sekelcuse' ]),
            Deity::factory()->make([ 'name' => 'Matron of Fate' ]),
            Deity::factory()->make([ 'name' => 'Nero' ]),
        ]);

        Pantheon::factory()->create([ 'name' => 'Midguard Pantheon' ])->deities()->saveMany([
            Deity::factory()->make([ 'name' => 'Odin' ]),
        ]);

        Pantheon::factory()->create([ 'name' => 'Green Pantheon' ])->deities()->saveMany([
            Deity::factory()->make([ 'name' => 'Vinsc' ]),
            Deity::factory()->make([ 'name' => 'Inca' ]),
            Deity::factory()->make([ 'name' => 'Silloway' ]),
            Deity::factory()->make([ 'name' => 'Lorn' ]),
            Deity::factory()->make([ 'name' => 'Gazenaroc' ]),
            Deity::factory()->make([ 'name' => 'Gwaina' ]),
            Deity::factory()->make([ 'name' => 'Talven' ]),
        ]);

        Pantheon::factory()->create([ 'name' => 'Blue Pantheon' ])->deities()->saveMany([
            Deity::factory()->make([ 'name' => 'Tilt' ]),
            Deity::factory()->make([ 'name' => 'Falaael' ]),
            Deity::factory()->make([ 'name' => 'Cassius' ]),
            Deity::factory()->make([ 'name' => 'Astaroth' ]),
            Deity::factory()->make([ 'name' => 'Raquel' ]),
        ]);

        Pantheon::factory()->create([ 'name' => 'Black Pantheon' ])->deities()->saveMany([
            Deity::factory()->make([ 'name' => 'Lorita' ]),
            Deity::factory()->make([ 'name' => "Oloken'hai" ]),
            Deity::factory()->make([ 'name' => 'Wode' ]),
            Deity::factory()->make([ 'name' => 'Babylon' ]),
            Deity::factory()->make([ 'name' => 'Crowley' ]),
        ]);
    }
}
