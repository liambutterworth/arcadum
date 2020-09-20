<?php

namespace Database\Seeders;

use App\Models\Deity;
use App\Models\DeityPantheon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class DeitySeeder extends Seeder
{
    public function run()
    {
        $this->create([
            'Viderick' => [ 'pantheon' => 'white-pantheon' ],
            'Vavren' => [ 'pantheon' => 'white-pantheon' ],
            'Glory' => [ 'pantheon' => 'white-pantheon' ],
            'Runethares' => [ 'pantheon' => 'white-pantheon' ],
            'The Seven' =>  [ 'pantheon' => 'white-pantheon' ],
            'Iass' => [ 'pantheon' => 'grey-pantheon' ],
            'Oun' => [ 'pantheon' => 'grey-pantheon' ],
            'Ezokhine' => [ 'pantheon' => 'grey-pantheon' ],
            'Kaheeli' => [ 'pantheon' => 'grey-pantheon' ],
            'Wondox' => [ 'pantheon' => 'grey-pantheon' ],
            'Sekelcuse' => [ 'pantheon' => 'grey-pantheon' ],
            'Matron of Fate' => [ 'pantheon' => 'grey-pantheon' ],
            'Nero' => [ 'pantheon' => 'grey-pantheon' ],
            'Odin' => [ 'pantheon' => 'midguard-pantheon' ],
            'Vinsc' => [ 'pantheon' => 'green-pantheon' ],
            'Inca' => [ 'pantheon' => 'green-pantheon' ],
            'Silloway' => [ 'pantheon' => 'green-pantheon' ],
            'Lorn' => [ 'pantheon' => 'green-pantheon' ],
            'Gazenaroc' => [ 'pantheon' => 'green-pantheon' ],
            'Gwaina' => [ 'pantheon' => 'green-pantheon' ],
            'Talven' => [ 'pantheon' => 'green-pantheon' ],
            'Tilt' => [ 'pantheon' => 'blue-pantheon' ],
            'Falaael' => [ 'pantheon' => 'blue-pantheon' ],
            'Cassius' => [ 'pantheon' => 'blue-pantheon' ],
            'Astaroth' => [ 'pantheon' => 'blue-pantheon' ],
            'Raquel' => [ 'pantheon' => 'blue-pantheon' ],
            'Lorita' => [ 'pantheon' => 'black-pantheon' ],
            "Oloken'hai" => [ 'pantheon' => 'black-pantheon' ],
            'Wode' => [ 'pantheon' => 'black-pantheon' ],
            'Babylon' => [ 'pantheon' => 'black-pantheon' ],
            'Crowley' => [ 'pantheon' => 'black-pantheon' ],
        ]);
    }

    public function create(array $deities): void
    {
        collect($deities)->each(function(array $data, string $name) {
            $slug = Str::of($name)->slug();
            $pantheon = Cache::get('seeders.pantheons.' . $data['pantheon']);
            $deity = Deity::factory()->make([ 'name' => $name ]);
            $deity->pantheon()->associate($pantheon);
            $deity->save();
            Cache::put("seeders.deities.$slug", $deity);
        });
    }
}
