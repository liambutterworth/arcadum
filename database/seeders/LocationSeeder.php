<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\LocationType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
    public function run()
    {
        $this->createTypes([
            'Planet',
            'Continent',
            'Country',
            'Wasteland',
            'Hills',
            'Plains',
            'Coast',
            'Riverlands',
            'Valley',
            'Mountains',
            'Desert',
            'Bay',
            'Tundra',
            'IDK',
            'Forest',
            'Woods',
            'Jungle',
            'Fields',
            'City',
            'Town',
            'Village',
        ]);

        $this->create([
            'Verum' => [ 'type' => 'planet' ],
            'Kalkatesh' => [ 'type' => 'continent', 'parent' => 'verum' ],
            'Bloodwave Bay' => [ 'type' => 'country', 'parent' => 'kalkatesh' ],
            'The Freelands' => [ 'type' => 'idk', 'parent' => 'bloodwave-bay' ],
            'The Wild Isles' => [ 'type' => 'idk', 'parent' => 'bloodwave-bay' ],
            'Connatorga' => [ 'type' => 'idk', 'parent' => 'bloodwave-bay' ],
            'Cliffs of Dane' => [ 'type' => 'idk', 'parent' => 'bloodwave-bay' ],
            'The Badlands' => [ 'type' => 'idk', 'parent' => 'kalkatesh' ],
            'Eyes of Sorrow' => [ 'type' => 'idk', 'parent' => 'the-badlands' ],
            'Nightlands' => [ 'type' => 'idk', 'parent' => 'the-badlands' ],
            'Rotten Would' => [ 'type' => 'idk', 'parent' => 'the-badlands' ],
            'The Culn' => [ 'type' => 'idk', 'parent' => 'the-badlands' ],
            'Steton' => [ 'type' => 'idk', 'parent' => 'kalkatesh' ],
            'Brutal Coast' => [ 'type' => 'coast', 'parent' => 'steton' ],
            'Highriver' => [ 'type' => 'riverlands', 'parent' => 'steton' ],
            "King's Crest" => [ 'type' => 'idk', 'parent' => 'steton' ],
            'Windlance Valley' => [ 'type' => 'idk', 'parent' => 'steton' ],
            'Maelstrom Mountains' => [ 'type' => 'mountains', 'parent' => 'steton' ],
            'Dolten' => [ 'type' => 'mountains', 'parent' => 'kalkatesh' ],
            'Abhorrent Arboreal' => [ 'type' => 'forest', 'parent' => 'dolten' ],
            'Fanged Hills' => [ 'type' => 'hills', 'parent' => 'abhorrent-arboreal' ],
            'Grasping Thicket' => [ 'type' => 'forest', 'parent' => 'abhorrent-arboreal' ],
            'Gravewatch' => [ 'type' => 'idk', 'parent' => 'grasping-thicket' ],
            'Bleak Reaches' => [ 'type' => 'idk', 'parent' => 'abhorrent-arboreal' ],
            'Coin Copse' => [ 'type' => 'idk', 'parent' => 'abhorrent-arboreal' ],
            'Howling Hills' => [ 'type' => 'hills', 'parent' => 'abhorrent-arboreal' ],
            'Feywood' => [ 'type' => 'woods', 'parent' => 'abhorrent-arboreal' ],
            'Douglasfall' => [ 'type' => 'idk', 'parent' => 'feywood' ],
            'Webwood' => [ 'type' => 'woods', 'parent' => 'abhorrent-arboreal' ],
            'Pale Fields' => [ 'type' => 'fields', 'parent' => 'abhorrent-arboreal' ],
            'Daborak' => [ 'type' => 'mountains', 'parent' => 'kalkatesh' ],
            'The Rolling Wastes' => [ 'type' => 'wasteland', 'parent' => 'daborak' ],
            "Stalker's Eye" => [ 'type' => 'idk', 'parent' => 'the-rolling-wastes' ],
            'Blackwheel' => [ 'type' => 'idk', 'parent' => 'the-rolling-wastes' ],
            'Steelfield' => [ 'type' => 'idk', 'parent' => 'the-rolling-wastes' ],
            'Thunderlands' => [ 'type' => 'idk', 'parent' => 'daborak' ],
            'Ragehoof' => [ 'type' => 'idk', 'parent' => 'thunderlands' ],
            'The Razor Cliffs' => [ 'type' => 'idk', 'parent' => 'daborak' ],
            'Ramons Roost' => [ 'type' => 'idk', 'parent' => 'the-razoer-cliffs' ],
            "Graver's Coast" => [ 'type' => 'idk', 'parent' => 'the-razoer-cliffs' ],
            'Shadowfields' => [ 'type' => 'fields', 'parent' => 'daborak' ],
            'Gaze Stone' => [ 'type' => 'idk', 'parent' => 'shadowfields' ],
            'Dark Gate' => [ 'type' => 'idk', 'parent' => 'shadowfields' ],
            'Bloodwave Bay' => [ 'type' => 'country', 'parent' => 'kalkatesh' ],
            'The Freelands' => [ 'type' => 'idk', 'parent' => 'bloodwave-bay' ],
            'The Wild Isles' => [ 'type' => 'idk', 'parent' => 'bloodwave-bay' ],
            'Connatorga' => [ 'type' => 'idk', 'parent' => 'bloodwave-bay' ],
            'Cliffs of Dane' => [ 'type' => 'idk', 'parent' => 'bloodwave-bay' ],
            'The Badlands' => [ 'type' => 'idk', 'parent' => 'kalkatesh' ],
            'Eyes of Sorrow' => [ 'type' => 'idk', 'parent' => 'the-badlands' ],
            'Nightlands' => [ 'type' => 'idk', 'parent' => 'the-badlands' ],
            'Rotten Would' => [ 'type' => 'idk', 'parent' => 'the-badlands' ],
            'The Culn' => [ 'type' => 'idk', 'parent' => 'the-badlands' ],
            'Steton' => [ 'type' => 'idk', 'parent' => 'kalkatesh' ],
            'Brutal Coast' => [ 'type' => 'coast', 'parent' => 'steton' ],
            'Highriver' => [ 'type' => 'riverlands', 'parent' => 'steton' ],
            "King's Crest" => [ 'type' => 'idk', 'parent' => 'steton' ],
            'Windlance Valley' => [ 'type' => 'idk', 'parent' => 'steton' ],
            'Maelstrom Mountains' => [ 'type' => 'mountains', 'parent' => 'steton' ],
            'Dolten' => [ 'type' => 'mountains', 'parent' => 'kalkatesh' ],
            'Abhorrent Arboreal' => [ 'type' => 'forest', 'parent' => 'dolten' ],
            'Fanged Hills' => [ 'type' => 'hills', 'parent' => 'abhorrent-arboreal' ],
            'Grasping Thicket' => [ 'type' => 'forest', 'parent' => 'abhorrent-arboreal' ],
            'Gravewatch' => [ 'type' => 'idk', 'parent' => 'grasping-thicket' ],
            'Bleak Reaches' => [ 'type' => 'idk', 'parent' => 'abhorrent-arboreal' ],
            'Coin Copse' => [ 'type' => 'idk', 'parent' => 'abhorrent-arboreal' ],
            'Howling Hills' => [ 'type' => 'hills', 'parent' => 'abhorrent-arboreal' ],
            'Feywood' => [ 'type' => 'woods', 'parent' => 'abhorrent-arboreal' ],
            'Douglasfall' => [ 'type' => 'idk', 'parent' => 'feywood' ],
            'Webwood' => [ 'type' => 'woods', 'parent' => 'abhorrent-arboreal' ],
            'Pale Fields' => [ 'type' => 'fields', 'parent' => 'abhorrent-arboreal' ],
            'Daborak' => [ 'type' => 'mountains', 'parent' => 'kalkatesh' ],
            'The Rolling Wastes' => [ 'type' => 'wasteland', 'parent' => 'daborak' ],
            "Stalker's Eye" => [ 'type' => 'idk', 'parent' => 'the-rolling-wastes' ],
            'Blackwheel' => [ 'type' => 'idk', 'parent' => 'the-rolling-wastes' ],
            'Steelfield' => [ 'type' => 'idk', 'parent' => 'the-rolling-wastes' ],
            'Thunderlands' => [ 'type' => 'idk', 'parent' => 'daborak' ],
            'Ragehoof' => [ 'type' => 'idk', 'parent' => 'thunderlands' ],
            'The Razor Cliffs' => [ 'type' => 'idk', 'parent' => 'daborak' ],
            'Ramons Roost' => [ 'type' => 'idk', 'parent' => 'the-razoer-cliffs' ],
            "Graver's Coast" => [ 'type' => 'idk', 'parent' => 'the-razoer-cliffs' ],
            'Shadowfields' => [ 'type' => 'fields', 'parent' => 'daborak' ],
            'Gaze Stone' => [ 'type' => 'idk', 'parent' => 'shadowfields' ],
            'Dark Gate' => [ 'type' => 'idk', 'parent' => 'shadowfields' ],
        ]);
    }

    public function createTypes(array $types): void
    {
        collect($types)->each(function(string $name) {
            $slug = Str::of($name)->slug();
            $type = LocationType::factory()->create([ 'name' => $name ]);
            Cache::put("seeders.location-types.$slug", $type);
        });
    }

    public function create(array $locations): void
    {
        collect($locations)->each(function(array $data, string $name) {
            $slug = Str::of($name)->slug();
            $type = Cache::get('seeders.location-types.' . $data['type']);
            $location = Location::factory()->make([ 'name' => $name ]);
            $location->type()->associate($type);

            if (Arr::exists($data, 'parent')) {
                $parent = Cache::get('seeders.locations.' . $data['parent']);
                $location->parent()->associate($parent);
            }

            $location->save();
            Cache::put("seeders.locations.$slug", $location);
        });
    }
}
