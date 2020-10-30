<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Support\Arr;

class RaceSeeder extends ResourceSeeder
{
    public function run()
    {
        $this->create([
            'Human' => [],
            'Variant Human' => [ 'parent' => 'human' ],
            'Human Illithari' => [ 'parent' => 'human' ],
            'Elves' => [],
            'Half-Elves' => [ 'parent' => 'elves' ],
            'High Elves' => [ 'parent' => 'elves' ],
            'Wood Elves' => [ 'parent' => 'elves' ],
            'Dark Elves' => [ 'parent' => 'elves' ],
            'Sea Elves' => [ 'parent' => 'elves' ],
            "Shar'Kai" => [ 'parent' => 'elves' ],
            'drow' => [ 'parent' => 'elves' ],
            'Gnomes' => [],
            'Forest Gnomes' => [ 'parent' => 'gnomes' ],
            'Rock Gnomes' => [ 'parent' => 'gnomes' ],
            'Svirfneblins' => [ 'parent' => 'gnomes' ],
            'Giant-Kin' => [],
            'Firbolgs' => [ 'parent' => 'giant-kin' ],
            'Goliaths' => [ 'parent' => 'giant-kin' ],
            'Minotaurs' => [ 'parent' => 'giant-kin' ],
            'Skinwalker' => [],
            'Aarokocra' => [ 'parent' => 'skinwalker' ],
            'Kenku' => [ 'parent' => 'skinwalker' ],
            'Tabaxi' => [ 'parent' => 'skinwalker' ],
            'Tortle' => [ 'parent' => 'skinwalker' ],
            'Dwarves' => [],
            'Mountain Dwarves' => [ 'parent' => 'dwarves' ],
            'Hill Dwarves' => [ 'parent' => 'dwarves' ],
            'Duergar' => [ 'parent' => 'dwarves' ],
            'Halflings' => [],
            'Lightfoot Halflings' => [ 'parent' => 'halflings' ],
            'Stout Halflings' => [ 'parent' => 'halflings' ],
            'Halfling (Songsworn)' => [ 'parent' => 'halflings' ],
            'Halfling (Ghostwise)' => [ 'parent' => 'halflings' ],
            'Greenskins' => [],
            'Half-Orcs' => [ 'parent' => 'greenskins' ],
            'Bugbears' => [ 'parent' => 'greenskins' ],
            'Goblins' => [ 'parent' => 'greenskins' ],
            'Hobgoblins' => [ 'parent' => 'greenskins' ],
            'Orcs' => [ 'parent' => 'greenskins' ],
            'Red Orcs' => [ 'parent' => 'greenskins' ],
            'Dragonborn' => [],
            'Plane Touched' => [],
            'Earth Ganasi' => [ 'parent' => 'plane-touched' ],
            'Water Ganasi' => [ 'parent' => 'plane-touched' ],
            'Air Ganasi' => [ 'parent' => 'plane-touched' ],
            'Fire Ganasi' => [ 'parent' => 'plane-touched' ],
            'Tieflings' => [ 'parent' => 'plane-touched' ],
            'Teifling (Asmodeus)' => [ 'parent' => 'tieflings' ],
            'Teifling (Baalzebul)' => [ 'parent' => 'tieflings' ],
            'Teifling (Dispatcher)' => [ 'parent' => 'tieflings' ],
            'Teifling (Fierna)' => [ 'parent' => 'tieflings' ],
            'Teifling (Glasya)' => [ 'parent' => 'tieflings' ],
            'Teifling (Levistus)' => [ 'parent' => 'tieflings' ],
            'Teifling (Mammon)' => [ 'parent' => 'tieflings' ],
            'Teifling (Mephistopheles)' => [ 'parent' => 'tieflings' ],
            'Teifling (Zariel)' => [ 'parent' => 'tieflings' ],
            'Teifling (Variant)' => [ 'parent' => 'tieflings' ],
            'Aasimar' => [ 'parent' => 'plane-touched' ],
            'Aasimar (Fallen)' => [ 'parent' => 'aasimar' ],
            'Aasimar (Protector)' => [ 'parent' => 'aasimar' ],
            'Aasimar (Scourge)' => [ 'parent' => 'aasimar' ],
            'Tritons' => [ 'parent' => 'plane-touched' ],
            'Lizardfolk' => [],
            'Yuan-Ti' => [ 'parent' => 'lizardfolk' ],
            'Kobolds' => [ 'parent' => 'lizardfolk' ],
            'Fey' => [],
            'Changling' => [ 'parent' => 'fey' ],
            'Satyr' => [ 'parent' => 'fey' ],
            'Sprite' => [ 'parent' => 'fey' ],
            'Dhampir' => [],
            'Revenant' => [],
            'Kuo-Toa' => [],
        ]);
    }

    public function create(array $races): void
    {
        collect($races)->each(function(array $data, string $name) {
            $race = Race::factory()->make([ 'name' => $name ]);

            if (Arr::exists($data, 'parent')) {
                $parent = $this->get('races', $data['parent']);
                $race->parent()->associate($parent);
            }

            $race->save();
            $this->set('races', $name, $race);
        });
    }
}
