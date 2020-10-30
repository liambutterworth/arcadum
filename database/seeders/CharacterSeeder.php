<?php

namespace Database\Seeders;

use App\Models\Alignment;
use App\Models\Character;
use App\Models\CharacterClass;
use App\Models\Deity;
use App\Models\Location;
use App\Models\Origin;
use App\Models\Race;
use Illuminate\Support\Arr;

class CharacterSeeder extends ResourceSeeder
{
    public function run()
    {
        $this->create([
            'Madd Morc' => [ 'user' => 'russmoney' ],
            'Derok Dramf' => [ 'user' => 'scottjund' ],
            'Neve' => [ 'user' => 'naomi' ],
            'Ives' => [ 'user' => 'snake' ],
            'Seren' => [ 'user' => 'summersalt' ],
            'Raost' => [ 'user' => 'woops' ],
            'Toot' => [ 'user' => 'theno1alex' ],
            'Moe Cowbull' => [ 'user' => 'criken' ],
            'Ahst' => [ 'user' => 'strippin' ],
            'Eustace' => [ 'user' => 'goldentot' ],
            'Gruff' => [ 'user' => 'ster' ],
            'Belanovan' => [ 'user' => 'surefour' ],
            'Ozzie' => [ 'user' => 'whompronnie' ],
            'Hackne' => [ 'user' => 'missuniverse' ],
            'Braktor' => [ 'user' => 'spaitken' ],
            'Guy' => [ 'user' => 'ster' ],
            'Scrumpo' => [ 'user' => 'moonmoon' ],
            'Big Pipe' => [ 'user' => 'admiralbahroo' ],
            'Huckleberry' => [ 'user' => 'octopimp' ],
            'Ikkar' => [ 'user' => 'joe-zieja' ],
            'dusty' => [ 'user' => 'datto' ],
            'claw' => [ 'user' => 'rhabby-v' ],
            'Gorrul' => [ 'user' => 'pterodactylsftw' ],
            'Elwood' => [ 'user' => 'blessius' ],
            'Tirsis' => [ 'user' => 'traveldanielle' ],
            'Ulm' => [ 'user' => 'sivelle' ],
            "Ll'lu" => [ 'user' => 'lilypichu' ],
            'Remag' => [ 'user' => 'michael-reeves' ],
            'Hashbrown' => [ 'user' => 'sykkuno' ],
            "P'mis" => [ 'user' => 'disguised-toast' ],
            'Bryan' => [ 'user' => 'quarter-jade' ],
            "E'ar" => [ 'user' => 'valkyrae' ],
            'Arcadamus' => [ 'user' => 'jessecox' ],
            'Zacharius' => [ 'user' => 'dodger' ],
            'Mirage' => [ 'user' => 'kelli-siren' ],
            'Koordrin' => [ 'user' => 'timmac' ],
            'Nox' => [ 'user' => 'mimika' ],
            'Terryn Zabi' => [ 'user' => 'projekt-melody' ],
            'Umi Tormenta' => [ 'user' => 'iron-mouse' ],
            'Revlis' => [ 'user' => 'silvervale' ],
            'Vaeri' => [ 'user' => 'momomischief' ],
            'Madeline' => [ 'user' => 'bunny-gif' ],
            'Zara' => [ 'user' => 'zentreya' ],
        ]);

        $this->createClasses([
            [ 'character' => 'madd-morc', 'type' => 'barbarian', 'archetype' => 'berserker', 'level' => 1 ],
        ]);
    }

    public function create(array $users): void
    {
        collect($users)->each(function(array $data, string $name) {
            $character = Character::factory()->make([ 'name' => $name ]);
            $user = $this->get('users', $data['user']);
            $alignment = Arr::has($data, 'alignment') ? $this->get('alignments', $data['alignment']) : Alignment::inRandomOrder()->first();
            $deity = Arr::has($data, 'deity') ? $this->get('deities', $data['deity']) : Deity::inRandomOrder()->first();
            $location = Arr::has($data, 'location') ? $this->get('locations', $data['location']) : Location::inRandomOrder()->first();
            $origin = Arr::has($data, 'origin') ? $this->get('origins', $data['origin']) : Origin::inRandomOrder()->first();
            $race = Arr::has($data, 'race') ? $this->get('races', $data['race']) : Race::inRandomOrder()->first();
            $character->alignment()->associate($alignment);
            $character->deity()->associate($deity);
            $character->home()->associate($origin);
            $character->origin()->associate($origin);
            $character->race()->associate($race);
            $character->user()->associate($user);
            $character->save();
            $this->set('characters', $name, $character);
        });
    }

    public function createClasses(array $classes): void
    {
        collect($classes)->each(function(array $data) {
            $class = CharacterClass::factory()->make([ 'level' => $data['level'] ]);
            $class->character()->associate($this->get('characters', $data['character']));
            $class->type()->associate($this->get('class-types', $data['type']));
            if (Arr::has($data, 'type')) $class->archetype()->associate($this->get('class-archetypes', $data['archetype']));
            $class->save();
        });
    }
}
