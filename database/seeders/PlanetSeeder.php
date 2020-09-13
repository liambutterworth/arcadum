<?php

namespace Database\Seeders;

use App\Models\Planet;
use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PlanetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $value = Planet::factory()->create([ 'name' => 'Verum' ])->regions()->saveMany([
        //     Region::factory()->create([ 'name' => 'Kalkatesh' ]),
        // ]);

        // Planet::factory()->create([ 'name' => 'Verum' ])->regions()->saveMany($this->createRegions([
        //     'kalkateesh' => [
        //         'Dolten' => [
        //             'Abhorrent Abboreal' => [
        //                 'foobar',
        //             ],
        //         ],
        //     ],
        // ]));

        // $kalkatesh = Region::factory()->create([ 'name' => 'Kalkatesh' ])->children()->saveMany([
        //     Region::factory()->afterCreating(function($region) {
        //         $region->children()->saveMany([
        //             Region::factory()->create([ 'name' => 'Abhorrent Abboreal' ]),
        //         ]);
        //     })->create([ 'name' => 'Dolten' ]),
        // ]);

        // Planet::factory()->create([ 'name' => 'Verum' ])->regions()->saveMany([
        //     Region::factory()->afterCreating(function($region) {
        //         $region->saveMany([
        //             Region::factory()->create([ 'name' => 'Dolten' ]),
        //         ]);
        //     })->create([ 'name' => 'Kalkatesh' ]),
        // ]);

        // $kalkatesh = Region::factory()->afterMaking(function($kalkatesh) {
        //     $kalkatesh->children()->makeMany([
        //         Region::factory()->make([ 'name' => 'Dolten' ]),
        //     ]);
        // })->make([ 'name' => 'Kalkatesh' ]);

        $verum = Planet::factory()->create([ 'name' => 'Verum' ]);
        $queirg = Planet::factory()->create([ 'name' => 'Queirg' ]);
        $kalkatesh = Region::factory()->make([ 'name' => 'Kalkatesh' ]);
        $bloodwaveBay = Region::factory()->make([ 'name' => 'Bloodwave Bay' ]);
        $badlands = Region::factory()->make([ 'name' => 'The Badlands' ]);
        $steton = Region::factory()->make([ 'name' => 'Steton' ]);
        $dolten = Region::factory()->make([ 'name' => 'Dolten' ]);
        $freedlands = Region::factory()->make([ 'name' => 'The Freedlands' ]);
        $wildIsles = Region::factory()->make([ 'name' => 'The Wild Isles' ]);
        $eyesOfSorrow = Region::factory()->make([ 'name' => 'Eyes of Sorrow' ]);
        $abhorrentAbboreal = Region::factory()->make([ 'name' => 'Abhorrent Abboreal' ]);
        $fangedHills = Region::factory()->make([ 'name' => 'Fanged Hills' ]);

        $verum->regions()->saveMany([ $kalkatesh ]);
        $kalkatesh->children()->saveMany([ $bloodwaveBay, $steton, $dolten ]);
        $dolten->children()->saveMany([ $abhorrentAbboreal ]);
        $abhorrentAbboreal->children()->saveMany([ $fangedHills ]);

        // $verum->regions()->saveMany([
        //     $kalkatesh,
        // ]);

        // $kalkatesh->children()->saveMany([
        //     Region::factory()->make([ 'name' => 'Dolten' ]),
        // ]);
    }

    protected function createRegions($array): array
    {
        // $kalkatesh = Region::factory()->create([ 'name' => 'Kalkatesh' ])->children()->saveMany([
        //     Region::factory()->afterCreating(function($region) {
        //         $region->children()->saveMany([
        //             Region::factory()->create([ 'name' => 'Abhorrent Abboreal' ]),
        //         ]);
        //     })->create([ 'name' => 'Dolten' ]),
        // ]);

        // 'kalkateesh' => [
        //     'Steton',
        //
        //     'Dolten' => [
        //         'Abhorrent Abboreal',
        //     ],
        // ],

        $regions = [];

        foreach ($array as $key => $value) {
            if (is_numeric($key)) {
                $region = Region::factory()->make([ 'name' => $value ]);
            } else {
                $region = Region::factory()->afterMaking(function($region) use($value) {
                    $region->children()->saveMany($this->createRegions($value));
                })->make([ 'name' => $key ]);
            }

            $regions[] = $region;
        }

        return $regions;
    }
}
