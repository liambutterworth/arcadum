<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\LocationType;
use Illuminate\Support\Arr;

class LocationSeeder extends ResourceSeeder
{
    public function run()
    {
        $this->createTypes([
            'Bay',
            'City',
            'Coast',
            'Continent',
            'Country',
            'Desert',
            'Fields',
            'Forest',
            'Hills',
            'Jungle',
            'Mountains',
            'Planet',
            'Plains',
            'Riverlands',
            'Swamp',
            'Town',
            'Tundra',
            'Valley',
            'Village',
            'Wasteland',
            'Woods',
            'IDK',
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
            'Gravewatch' => [ 'type' => 'city', 'parent' => 'grasping-thicket' ],
            'Bleak Reaches' => [ 'type' => 'wasteland', 'parent' => 'abhorrent-arboreal' ],
            'Coin Copse' => [ 'type' => 'woods', 'parent' => 'abhorrent-arboreal' ],
            'Howling Hills' => [ 'type' => 'hills', 'parent' => 'abhorrent-arboreal' ],
            'Feywood' => [ 'type' => 'woods', 'parent' => 'abhorrent-arboreal' ],
            'Douglasfall' => [ 'type' => 'city', 'parent' => 'feywood' ],
            'Webwood' => [ 'type' => 'woods', 'parent' => 'abhorrent-arboreal' ],
            'Pale Fields' => [ 'type' => 'fields', 'parent' => 'abhorrent-arboreal' ],
            'The Mire' => [ 'type' => 'swamp', 'parent' => 'abhorrent-arboreal' ],
            'Daborak' => [ 'type' => 'mountains', 'parent' => 'kalkatesh' ],
            'The Rolling Wastes' => [ 'type' => 'wasteland', 'parent' => 'daborak' ],
            "Stalker's Eye" => [ 'type' => 'town', 'parent' => 'the-rolling-wastes' ],
            'Blackwheel' => [ 'type' => 'town', 'parent' => 'the-rolling-wastes' ],
            'Steelfield' => [ 'type' => 'town', 'parent' => 'the-rolling-wastes' ],
            'Thunderlands' => [ 'type' => 'idk', 'parent' => 'daborak' ],
            'Gordand' => [ 'type' => 'city', 'parent' => 'thunderlands', 'capital-of' => 'daborak' ],
            'Ragehoof' => [ 'type' => 'city', 'parent' => 'thunderlands' ],
            'The Razor Cliffs' => [ 'type' => 'idk', 'parent' => 'daborak' ],
            'Ramons Roost' => [ 'type' => 'city', 'parent' => 'the-razoer-cliffs' ],
            "Graver's Coast" => [ 'type' => 'town', 'parent' => 'the-razoer-cliffs' ],
            'Shadowfields' => [ 'type' => 'fields', 'parent' => 'daborak' ],
            'Gaze Stone' => [ 'type' => 'city', 'parent' => 'shadowfields' ],
            'Dark Gate' => [ 'type' => 'city', 'parent' => 'shadowfields' ],
            'The Country of Khao' => [ 'type' => 'country', 'parent' => 'kalkatesh' ],
            'The City of Khao' => [ 'type' => 'city', 'parent' => 'the-country-of-khao', 'capital-of' => 'the-country-of-khao' ],
            'The Tzar' => [ 'type' => 'jungle', 'parent' => 'the-country-of-khao' ],
            'The Underforest' => [ 'type' => 'jungle', 'parent' => 'the-tzar' ],
            'Vaden Falls' => [ 'type' => 'village', 'parent' => 'the-underforest' ],
            'Thornscorn' => [ 'type' => 'town', 'parent' => 'the-underforest' ],
            'Chrysalisk' => [ 'type' => 'town', 'parent' => 'the-underforest' ],
            'The Misty Canopy' => [ 'type' => 'jungle', 'parent' => 'the-tzar' ],
            'The Twin Fangs' => [ 'type' => 'jungle', 'parent' => 'the-tzar' ],
            'The Wild Coast' => [ 'type' => 'coast', 'parent' => 'the-tzar' ],
            'Krazax' => [ 'type' => 'country', 'parent' => 'kalkatesh' ],
            'Iron Highlands' => [ 'type' => 'mountains', 'parent' => 'krazax' ],
            'The Western Reaches' => [ 'type' => 'tundra', 'parent' => 'iron-highlands' ],
            'Westwatch' => [ 'type' => 'town', 'parent' => 'the-western-reaches' ],
            'Rhymeridge' => [ 'type' => 'city', 'parent' => 'the-western-reaches' ],
            'Spine of Crovux' => [ 'type' => 'mountains', 'parent' => 'iron-highlands' ],
            'Firstcliff' => [ 'type' => 'city', 'parent' => 'spine-of-crovux', 'capital-of' => 'krazax' ],
            'Goldfalls' => [ 'type' => 'town', 'parent' => 'spine-of-crovux' ],
            'Green Spring' => [ 'type' => 'city', 'parent' => 'spine-of-crovux' ],
            "Lodrag's Rest" => [ 'type' => 'town', 'parent' => 'spine-of-crovux' ],
            'Solemn' => [ 'type' => 'town', 'parent' => 'spine-of-crovux' ],
            'Lowlands' => [ 'type' => 'plains', 'parent' => 'iron-highlands' ],
            'Siltsore' => [ 'type' => 'town', 'parent' => 'lowlands' ],
            'Silver Field' => [ 'type' => 'town', 'parent' => 'lowlands' ],
            "Sonja's Hook" => [ 'type' => 'town', 'parent' => 'lowlands' ],
            'Twin Shields' => [ 'type' => 'city', 'parent' => 'lowlands' ],
            'Lonely Coast' => [ 'type' => 'coast', 'parent' => 'iron-highlands' ],
            'Pike' => [ 'type' => 'town', 'parent' => 'lonely-coast' ],
            'Songport' => [ 'type' => 'city', 'parent' => 'lonely-coast' ],
            'Khaz-Awe' => [ 'type' => 'city', 'parent' => 'lonely-coast' ],
            'Majital' => [ 'type' => 'country', 'parent' => 'kalkatesh' ],
            'Talktaken' => [ 'type' => 'idk', 'parent' => 'majital' ],
            'Zagzin, The Laughing Jackel' => [ 'type' => 'idk', 'parent' => 'majital' ],
            'Macelous Kingvale' => [ 'type' => 'idk', 'parent' => 'majital' ],
            'Dorado Khaine' => [ 'type' => 'idk', 'parent' => 'majital' ],
            'White Sands' => [ 'type' => 'desert', 'parent' => 'majital' ],
            'The Bay of Sages' => [ 'type' => 'idk', 'parent' => 'white-sands' ],
            "Baghla'Tash" => [ 'type' => 'city', 'parent' => 'white-sands' ],
            'Mirage' => [ 'type' => 'city', 'parent' => 'white-sands', 'capitla-of' => 'majital' ],
            'Salegesh' => [ 'type' => 'city', 'parent' => 'white-sands' ],
            'Voton' => [ 'type' => 'city', 'parent' => 'white-sands' ],
            'The Mage Coast' => [ 'type' => 'coast', 'parent' => 'majital' ],
            'Scriven Port' => [ 'type' => 'idk', 'parent' => 'the-mage-coast' ],
            'Kazakala' => [ 'type' => 'idk', 'parent' => 'the-mage-coast' ],
            'The Scour Sand' => [ 'type' => 'desert', 'parent' => 'majital' ],
            'Greater Scour' => [ 'type' => 'desert', 'parent' => 'the-scour-sand' ],
            'Fade' => [ 'type' => 'city', 'parent' => 'greater-scour' ],
            'Sala' => [ 'type' => 'town', 'parent' => 'greater-scour' ],
            'Lesser Scour' => [ 'type' => 'desert', 'parent' => 'the-scour-sand' ],
            "Uil'Ta" => [ 'type' => 'town', 'parent' => 'lesser-scour' ],
            'Sandstone' => [ 'type' => 'city', 'parent' => 'lesser-scour' ],
            'Orde' => [ 'type' => 'country', 'parent' => 'kalkatesh' ],
            'The While Council' => [ 'type' => 'idk', 'parent' => 'orde' ],
            'The Veil' => [ 'type' => 'idk', 'parent' => 'orde' ],
            'The Heartlands' => [ 'type' => 'fields', 'parent' => 'orde' ],
            'The Eastern Heartlands' => [ 'type' => 'fields', 'parent' => 'the-heartlands' ],
            'Wallwatch' => [ 'type' => 'city', 'parent' => 'the-eastern-heartlands' ],
            "Pallor's Fog" => [ 'type' => 'town', 'parent' => 'the-eastern-heartlands' ],
            "Jordan's Rest" => [ 'type' => 'town', 'parent' => 'the-eastern-heartlands' ],
            'Kallone' => [ 'type' => 'city', 'parent' => 'the-eastern-heartlands' ],
            "Fiora's Rest" => [ 'type' => 'town', 'parent' => 'the-eastern-heartlands' ],
            'Keller' => [ 'type' => 'city', 'parent' => 'the-eastern-heartlands' ],
            'Morlavene' => [ 'type' => 'town', 'parent' => 'the-eastern-heartlands' ],
            'The Western Heartlands' => [ 'type' => 'fields', 'parent' => 'the-heartlands' ],
            'Crestfall' => [ 'type' => 'city', 'parent' => 'the-western-heartlands', 'capital-of' => 'orde' ],
            'Cliffgate' => [ 'type' => 'city', 'parent' => 'the-western-heartlands' ],
            'Radiance' => [ 'type' => 'city', 'parent' => 'the-western-heartlands' ],
            'Fireport' => [ 'type' => 'city', 'parent' => 'the-western-heartlands' ],
        ]);
    }

    public function createTypes(array $types): void
    {
        collect($types)->each(function(string $name) {
            $type = LocationType::factory()->create([ 'name' => $name ]);
            $this->set('location-types', $name, $type);
        });
    }

    public function create(array $locations): void
    {
        collect($locations)->each(function(array $data, string $name) {
            $type = $this->get('location-types', $data['type']);
            $location = Location::factory()->make([ 'name' => $name ]);
            $location->type()->associate($type);

            if (Arr::exists($data, 'parent')) {
                $parent = $this->get('locations', $data['parent']);
                $location->parent()->associate($parent);
            }

            $location->save();
            $this->set('locations', $name, $location);

            if (Arr::exists($data, 'capital-of')) {
                $capitalOf = $this->get('locations', $data['capital-of']);
                $capitalOf->capital()->save($location);
            }
        });
    }
}
