<?php

namespace Database\Seeders;

use App\Models\Alignment;
use App\Models\Background;
use App\Models\Character;
use App\Models\CharacterClass;
use App\Models\CharacterClassArchetype;
use App\Models\CharacterClassFeature;
use App\Models\CharacterClassLevel;
use App\Models\CharacterClassType;
use App\Models\Deity;
use App\Models\Location;
use App\Models\Race;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CharacterSeeder extends Seeder
{
    public function run()
    {
        $this->create([
            'Madd Morc' => [ 'user' => 'russmoney', 'class' => 'barbarian', 'archetype' => 'berserker' ],
            'Derek Dramf' => [ 'user' => 'scottjund' ],
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
    }

    public function create(array $users): void
    {
        collect($users)->each(function(array $data, string $name) {
            $slug = Str::of($name)->slug();
            $character = Character::factory()->make([ 'name' => $name ]);
            $user = Cache::get('seeders.users.' . $data['user']);

            // dump($data['user'] . " ---------- $slug");
            $alignment = Arr::exists($data, 'alignment')
                ? Cache::get('seeders.background.' . $data['background'])
                : Background::inRandomOrder()->first();

            $background = Arr::exists($data, 'background')
                ? Cache::get('seeders.background.' . $data['background'])
                : Background::inRandomOrder()->first();

            $deity = Arr::exists($data, 'deity')
                ? Cache::get('seeders.deities.' . $data['deity'])
                : Deity::inRandomOrder()->first();

            $race = Arr::exists($data, 'race')
                ? Cache::get('seeders.races.' . $data['race'])
                : Race::inRandomOrder()->first();

            $origin = Arr::exists($data, 'origin')
                ? Cache::get('seeders.locations.' . $data['origin'])
                : Location::inRandomOrder()->first();

            $character->alignment()->associate($alignment);
            $character->background()->associate($background);
            $character->deity()->associate($deity);
            $character->origin()->associate($origin);
            $character->race()->associate($race);
            $character->user()->associate($user);
            $character->save();

            if (Arr::exists($data, 'class')) {
                $class = CharacterClass::factory()->make();
                $type = Cache::get('seeders.class-types.' . $data['class']);

                if (Arr::exists($data, 'archetype')) {
                    $archetype = Cache::get('seeders.class-archetypes.' . $data['archetype']);
                    $class->archetype()->associate($archetype);
                }

                $class->character()->associate($character);
                $class->type()->associate($type);
                $class->save();
            }

            Cache::put("seeders.characters.$slug", $character);
        });
    }
}
