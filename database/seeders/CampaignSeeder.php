<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Character;
use App\Models\CharacterClass;
use App\Models\CharacterStats;
use App\Models\Series;
use App\Models\User;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    public function run()
    {
        // campaigns
        $mawOfAbbadon = Campaign::factory()->create([ 'name' => 'Maw of Abbadon' ]);
        $dealsInTheDark = Campaign::factory()->create([ 'name' => 'Deals in the Dark' ]);
        $dualityOfDragons = Campaign::factory()->create([ 'name' => 'Duality of Dragons' ]);
        $meaningOfMadness = Campaign::factory()->create([ 'name' => 'Meaning of Madness' ]);
        $heartOfTyre = Campaign::factory()->create([ 'name' => 'Heart of Tyre' ]);
        $gamblersDelight = Campaign::factory()->create([ 'name' => "Gambler's Delight" ]);
        $shadowOfTyre = Campaign::factory()->create([ 'name' => 'Shadow of Tyre' ]);
        $gailensGate = Campaign::factory()->create([ 'name' => "Gailen's Gate" ]);
        $soulOfTyre = Campaign::factory()->create([ 'name' => 'Soul of Tyre' ]);
        $shatteredCrowns = Campaign::factory()->create([ 'name' => 'Shattered Crowns' ]);
        $shatteredCrownsS2 = Campaign::factory()->create([ 'name' => 'Shattered Crowns Season 2' ]);
        $secretInTheStones = Campaign::factory()->create([ 'name' => 'Secret in the Stones' ]);
        $brokenBonds = Campaign::factory()->create([ 'name' => 'Broken Bonds' ]);
        $strageRoads = Campaign::factory()->create([ 'name' => 'Strange Roads' ]);
        $deathAndDebts = Campaign::factory()->create([ 'name' => 'Death and Debts' ]);

        // series
        $lateNightCrew = Series::factory()->create([ 'name' => 'Late Night Crew' ])->campaigns()->saveMany([ $mawOfAbbadon, $dealsInTheDark, $dualityOfDragons, $meaningOfMadness, $heartOfTyre ]);
        $scatteredClowns = Series::factory()->create([ 'name' => 'Scattered Clowns' ])->campaigns()->saveMany([ $shatteredCrowns, $shatteredCrownsS2 ]);
        $tyresLabyrinth = Series::factory()->create([ 'name' => "Tyre's Labyrinth" ])->campaigns()->saveMany([ $shadowOfTyre, $heartOfTyre, $soulOfTyre ]);

        // users
        $russMoney = User::factory()->create([ 'name' => 'RussMoneey' ]);
        $scottJund = User::factory()->create([ 'name' => 'ScottJund' ]);
        $naomi = User::factory()->create([ 'name' => 'Naomi' ]);
        $snake = User::factory()->create([ 'name' => 'Snake' ]);
        $summerSalt = User::factory()->create([ 'name' => 'SummerSalt' ]);
        $woops = User::factory()->create([ 'name' => 'Woops' ]);
        $theNo1Alex = User::factory()->create([ 'name' => 'TheNo1Alex' ]);
        $criken = User::factory()->create([ 'name' => 'Criken' ]);
        $strippin = User::factory()->create([ 'name' => 'Strippin' ]);
        $goldenTot = User::factory()->create([ 'name' => 'GoldenTot' ]);
        $ster = User::factory()->create([ 'name' => 'Ster' ]);
        $surefour = User::factory()->create([ 'name' => 'Surefour' ]);
        $whompRonnie = User::factory()->create([ 'name' => 'WhompRonnie' ]);
        $missUniverse = User::factory()->create([ 'name' => 'MissUniverse' ]);
        $spaitken = User::factory()->create([ 'name' => 'Spaitken' ]);
        $moonMoon = User::factory()->create([ 'name' => 'MoonMoon' ]);
        $admiralBahroo = User::factory()->create([ 'name' => 'AdmiralBahroo' ]);
        $octopimp = User::factory()->create([ 'name' => 'Octopimp' ]);
        $joeZieja = User::factory()->create([ 'name' => 'Joe Zieja' ]);
        $datto = User::factory()->create([ 'name' => 'Datto' ]);
        $rhabbyv = User::factory()->create([ 'name' => 'Rhabby_v' ]);
        $pterodactylsftw = User::factory()->create([ 'name' => 'Pterodactylsftw' ]);
        $blessious = User::factory()->create([ 'name' => 'Blessious' ]);
        $travelDannielle = User::factory()->create([ 'name' => 'Traveldanielle' ]);
        $sivelle = User::factory()->create([ 'name' => 'Sivelle' ]);
        $lilyPichu = User::factory()->create([ 'name' => 'LilyPichu' ]);
        $michaelReeves = User::factory()->create([ 'name' => 'Michael Reeves' ]);
        $sykkuno = User::factory()->create([ 'name' => 'Sykkuno' ]);
        $disguisedToast = User::factory()->create([ 'name' => 'Disguised Toast' ]);
        $quarterJade = User::factory()->create([ 'name' => 'Quarter Jade' ]);
        $valkyrae = User::factory()->create([ 'name' => 'Valkyrae' ]);
        $jesseCox = User::factory()->create([ 'name' => 'JesseCox' ]);
        $dodger = User::factory()->create([ 'name' => 'Dodger' ]);
        $kelliSiren = User::factory()->create([ 'name' => 'Kelli_Siren' ]);
        $timmac = User::factory()->create([ 'name' => 'Timmac' ]);
        $mimika = User::factory()->create([ 'name' => 'Mimika' ]);
        $projektMelody = User::factory()->create([ 'name' => 'Project Melody' ]);
        $ironMouse = User::factory()->create([ 'name' => 'Iron_Mouse' ]);
        $silvervale = User::factory()->create([ 'name' => '_Silvervale_' ]);
        $momo = User::factory()->create([ 'name' => 'MomoMischief' ]);
        $bunnyGif = User::factory()->create([ 'name' => 'bunny_gif' ]);
        $zentreya = User::factory()->create([ 'name' => 'Zentreya' ]);

        // characters
        $maddMorc = $russMoney->characters()->save(Character::factory()->make([ 'name' => 'Madd Morc' ]));
        $derekDranf = $scottJund->characters()->save(Character::factory()->make([ 'name' => 'Derek Dranf' ]));
        $neve = $naomi->characters()->save(Character::factory()->make([ 'name' => 'Neve' ]));
        $ives = $snake->characters()->save(Character::factory()->make([ 'name' => 'Ives' ]));
        $seren = $summerSalt->characters()->save(Character::factory()->make([ 'name' => 'Seren' ]));
        $raost = $woops->characters()->save(Character::factory()->make([ 'name' => 'Raost' ]));
        $toot = $theNo1Alex->characters()->save(Character::factory()->make([ 'name' => 'Toot' ]));
        $moeCowbull = $theNo1Alex->characters()->save(Character::factory()->make([ 'name' => 'Moe Cowbull' ]));
        $ahst = $strippin->characters()->save(Character::factory()->make([ 'name' => 'Ahst' ]));
        $eustace = $strippin->characters()->save(Character::factory()->make([ 'name' => 'Eustace' ]));
        $gruff = $ster->characters()->save(Character::factory()->make([ 'name' => 'Gruff' ]));
        $belanovan = $surefour->characters()->save(Character::factory()->make([ 'name' => 'Belanovan' ]));
        $ozzie = $whompRonnie->characters()->save(Character::factory()->make([ 'name' => 'Ozzie' ]));
        $hackne = $missUniverse->characters()->save(Character::factory()->make([ 'name' => 'Hackne' ]));
        $braktor = $spaitken->characters()->save(Character::factory()->make([ 'name' => 'Braktor' ]));
        $guy = $ster->characters()->save(Character::factory()->make([ 'name' => 'Guy' ]));
        $scrumpo = $moonMoon->characters()->save(Character::factory()->make([ 'name' => 'Scrumpo' ]));
        $bigPipe = $admiralBahroo->characters()->save(Character::factory()->make([ 'name' => 'Big Pipe' ]));
        $huckleberry = $octopimp->characters()->save(Character::factory()->make([ 'name' => 'Huckleberry' ]));
        $ikkar = $joeZieja->characters()->save(Character::factory()->make([ 'name' => 'Ikkar' ]));
        $dusty = $datto->characters()->save(Character::factory()->make([ 'name' => 'Dusty' ]));
        $claw = $rhabbyv->characters()->save(Character::factory()->make([ 'name' => 'Claw' ]));
        $gorrul = $pterodactylsftw->characters()->save(Character::factory()->make([ 'name' => 'Gorrul' ]));
        $elwood = $blessious->characters()->save(Character::factory()->make([ 'name' => 'Elwood' ]));
        $tirsis = $travelDannielle->characters()->save(Character::factory()->make([ 'name' => 'Trisis' ]));
        $ulm = $sivelle->characters()->save(Character::factory()->make([ 'name' => 'Ulm' ]));
        $lilu = $lilyPichu->characters()->save(Character::factory()->make([ 'name' => 'Ulm' ]));
        $remag = $michaelReeves->characters()->save(Character::factory()->make([ 'name' => 'Remag' ]));
        $hashbrown = $sykkuno->characters()->save(Character::factory()->make([ 'name' => 'Hasbrown' ]));
        $pmis = $disguisedToast->characters()->save(Character::factory()->make([ 'name' => "P'mis" ]));
        $bryan = $quarterJade->characters()->save(Character::factory()->make([ 'name' => 'Bryan' ]));
        $ear = $valkyrae->characters()->save(Character::factory()->make([ 'name' => "E'ar" ]));
        $arcadamus = $jesseCox->characters()->save(Character::factory()->make([ 'name' => 'Arcadamus' ]));
        $zacharius = $dodger->characters()->save(Character::factory()->make([ 'name' => 'Zacharius' ]));
        $mirage = $kelliSiren->characters()->save(Character::factory()->make([ 'name' => 'Mirage' ]));
        $koordrin = $timmac->characters()->save(Character::factory()->make([ 'name' => 'Koordrin' ]));
        $nox = $mimika->characters()->save(Character::factory()->make([ 'name' => 'Nox' ]));
        $terrynZabi = $projektMelody->characters()->save(Character::factory()->make([ 'name' => 'Terryn Zabi' ]));
        $umiTormenta = $ironMouse->characters()->save(Character::factory()->make([ 'name' => 'Umi Tormenta' ]));
        $revlis = $silvervale->characters()->save(Character::factory()->make([ 'name' => 'Revlis' ]));
        $vaeri = $momo->characters()->save(Character::factory()->make([ 'name' => 'Vaeri' ]));
        $madeline = $bunnyGif->characters()->save(Character::factory()->make([ 'name' => 'Madeline' ]));
        $zara = $zentreya->characters()->save(Character::factory()->make([ 'name' => 'Zara' ]));

        // classes
        Character::all()->each(function($character) {
            $character->classes()->save(CharacterClass::factory()->make());
        });

        // parties
        $mawOfAbbadon->party->members()->saveMany([ $maddMorc, $derekDranf, $neve, $ives, $seren ]);
        $dealsInTheDark->party->members()->saveMany([ $maddMorc, $derekDranf, $neve, $ives, $seren ]);
        $dualityOfDragons->party->members()->saveMany([ $maddMorc, $derekDranf, $neve, $ives, $seren ]);
        $meaningOfMadness->party->members()->saveMany([ $maddMorc, $derekDranf, $neve, $ives, $seren ]);
        $heartOfTyre->party->members()->saveMany([ $maddMorc, $derekDranf, $neve, $ives, $seren ]);
    }
}
