<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->create([
            'RussMoney',
            'ScottJund',
            'Naomi',
            'Snake',
            'SummerSalt',
            'Woops',
            'TheNo1Alex',
            'Criken',
            'Strippin',
            'GoldenTot',
            'Ster',
            'Surefour',
            'WhompRonnie',
            'MissUniverse',
            'Spaitken',
            'MoonMoon',
            'AdmiralBahroo',
            'Octopimp',
            'Joe Zieja',
            'Datto',
            'Rhabby_v',
            'Pterodactylsftw',
            'Blessius',
            'Traveldanielle',
            'Sivelle',
            'LilyPichu',
            'Michael Reeves',
            'Sykkuno',
            'Disguised Toast',
            'Quarter Jade',
            'Valkyrae',
            'JesseCox',
            'Dodger',
            'Kelli_Siren',
            'Timmac',
            'Mimika',
            'Projekt Melody',
            'Iron_Mouse',
            '_Silvervale_',
            'MomoMischief',
            'bunny_gif',
            'Zentreya',
        ]);
    }

    public function create(array $users)
    {
        collect($users)->each(function(string $name) {
            $slug = Str::of($name)->slug();
            $user = User::factory()->create([ 'name' => $name ]);
            Cache::put("seeders.users.$slug", $user);
        });
    }
}
