<?php

namespace Database\Seeders;

use App\Models\Municipality;
use App\Models\MunicipalityType;
use App\Models\Origin;
use App\Models\Planet;
use App\Models\Region;
use App\Models\RegionType;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run()
    {
        // planets
        $verum = Planet::factory()->create([ 'name' => 'Verum' ]);
        $queirg = Planet::factory()->create([ 'name' => 'Queirg' ]);

        // region types
        $continent = RegionType::factory()->create([ 'name' => 'Continent' ]);
        $country = RegionType::factory()->create([ 'name' => 'Country' ]);
        $forest = RegionType::factory()->create([ 'name' => 'Forest' ]);
        $wasteland = RegionType::factory()->create([ 'name' => 'Wasteland' ]);
        $hills = RegionType::factory()->create([ 'name' => 'Hills' ]);
        $plains = RegionType::factory()->create([ 'name' => 'Plains' ]);

        // municipality types
        $city = MunicipalityType::factory()->create([ 'name' => 'City' ]);
        $town = MunicipalityType::factory()->create([ 'name' => 'Town' ]);
        $village = MunicipalityType::factory()->create([ 'name' => 'Village' ]);

        // regions
        $kalkatesh = $continent->regions()->save(Region::factory()->make([ 'name' => 'Kalkatesh' ]));
        $steton = $country->regions()->save(Region::factory()->make([ 'name' => 'Steton' ]));
        $dolten = $country->regions()->save(Region::factory()->make([ 'name' => 'Dolten' ]));
        $krazax = $country->regions()->save(Region::factory()->make([ 'name' => 'Krazax' ]));
        $bloodwaveBay = $country->regions()->save(Region::factory()->make([ 'name' => 'Bloodwave Bay' ]));
        $badlands = $wasteland->regions()->save(Region::factory()->make([ 'name' => 'The Badlands' ]));
        $daborak = $country->regions()->save(Region::factory()->make([ 'name' => 'Daborak' ]));
        $thunderlands = $plains->regions()->save(Region::factory()->make([ 'name' => 'Thunderlands' ]));
        $abhorrentAbboreal = $forest->regions()->save(Region::factory()->make([ 'name' => 'Abhorrent Abboreal' ]));
        $fangedHills = $hills->regions()->save(Region::factory()->make([ 'name' => 'Fanged Hills' ]));

        // municipalities
        $gordand = $city->municipalities()->make([ 'name' => 'Gordand' ]);

        // hierarchy
        $verum->regions()->save($kalkatesh);
        $kalkatesh->children()->saveMany([ $steton, $dolten, $badlands, $daborak, $krazax ]);
        $daborak->children()->save($thunderlands);
        $dolten->children()->save($abhorrentAbboreal);
        $abhorrentAbboreal->children()->save($fangedHills);
        $thunderlands->municipalities()->save($gordand);

        // origins
        $krazax->origins()->save(Origin::factory()->make([ 'name' => 'Lowlander' ]));
        $krazax->origins()->save(Origin::factory()->make([ 'name' => 'Legionnaire' ]));
        $krazax->origins()->save(Origin::factory()->make([ 'name' => 'Peakfolk' ]));
        $dolten->origins()->save(Origin::factory()->make([ 'name' => 'Night Guard Aspirant' ]));
        $dolten->origins()->save(Origin::factory()->make([ 'name' => 'Gravewatcher' ]));
        $dolten->origins()->save(Origin::factory()->make([ 'name' => 'Ward of Witchtown' ]));
        $bloodwaveBay->origins()->save(Origin::factory()->make([ 'name' => 'Mage Coast' ]));
        $bloodwaveBay->origins()->save(Origin::factory()->make([ 'name' => 'Navigator' ]));
        $bloodwaveBay->origins()->save(Origin::factory()->make([ 'name' => 'Spelunker' ]));
        $steton->origins()->save(Origin::factory()->make([ 'name' => 'Brulette Slayer' ]));
        $steton->origins()->save(Origin::factory()->make([ 'name' => 'Dragon Slayer' ]));
        $steton->origins()->save(Origin::factory()->make([ 'name' => 'Floating Nomad' ]));
        $daborak->origins()->save(Origin::factory()->make([ 'name' => 'River Runner' ]));
        $daborak->origins()->save(Origin::factory()->make([ 'name' => 'Bandit of the Rolling Wastes' ]));
        $daborak->origins()->save(Origin::factory()->make([ 'name' => 'Daborakian Noble' ]));
    }
}
