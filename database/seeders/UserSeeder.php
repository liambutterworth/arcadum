<?php

namespace Database\Seeders;

use App\Models\User;

class UserSeeder extends ResourceSeeder
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
            $user = User::factory()->create([ 'name' => $name ]);
            $this->set('users', $name, $user);
        });
    }
}
