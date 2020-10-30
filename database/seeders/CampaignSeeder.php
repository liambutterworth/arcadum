<?php

namespace Database\Seeders;

use App\Models\Campaign;

class CampaignSeeder extends ResourceSeeder
{
    public function run()
    {
        $this->create([
            'Maw of Abbadon' => [ 'characters' => ['seren', 'ives', 'derek-dramf', 'neve', 'seren'] ],
            'Deals in the Dark' => [ 'characters' => ['seren', 'ives', 'derek-dramf', 'neve', 'seren'] ],
            'Shattered Crowns' => [ 'characters' => ['scrumpo', 'guy', 'huckleberry', 'ikkar', 'big-pipe'] ],
            'Shattered Crowns S2' => [ 'characters' => ['scrumpo', 'guy', 'huckleberry', 'ikkar', 'big-pipe'] ],
        ]);

        // campaigns
        // $mawOfAbbadon = Campaign::factory()->create([ 'name' => 'Maw of Abbadon' ]);
        // $dealsInTheDark = Campaign::factory()->create([ 'name' => 'Deals in the Dark' ]);
        // $dualityOfDragons = Campaign::factory()->create([ 'name' => 'Duality of Dragons' ]);
        // $meaningOfMadness = Campaign::factory()->create([ 'name' => 'Meaning of Madness' ]);
        // $heartOfTyre = Campaign::factory()->create([ 'name' => 'Heart of Tyre' ]);
        // $gamblersDelight = Campaign::factory()->create([ 'name' => "Gambler's Delight" ]);
        // $shadowOfTyre = Campaign::factory()->create([ 'name' => 'Shadow of Tyre' ]);
        // $gailensGate = Campaign::factory()->create([ 'name' => "Gailen's Gate" ]);
        // $soulOfTyre = Campaign::factory()->create([ 'name' => 'Soul of Tyre' ]);
        // $shatteredCrowns = Campaign::factory()->create([ 'name' => 'Shattered Crowns' ]);
        // $shatteredCrownsS2 = Campaign::factory()->create([ 'name' => 'Shattered Crowns Season 2' ]);
        // $secretInTheStones = Campaign::factory()->create([ 'name' => 'Secret in the Stones' ]);
        // $brokenBonds = Campaign::factory()->create([ 'name' => 'Broken Bonds' ]);
        // $strageRoads = Campaign::factory()->create([ 'name' => 'Strange Roads' ]);
        // $deathAndDebts = Campaign::factory()->create([ 'name' => 'Death and Debts' ]);

        // series
        // $lateNightCrew = Series::factory()->create([ 'name' => 'Late Night Crew' ])->campaigns()->saveMany([ $mawOfAbbadon, $dealsInTheDark, $dualityOfDragons, $meaningOfMadness, $heartOfTyre ]);
        // $scatteredClowns = Series::factory()->create([ 'name' => 'Scattered Clowns' ])->campaigns()->saveMany([ $shatteredCrowns, $shatteredCrownsS2 ]);
        // $tyresLabyrinth = Series::factory()->create([ 'name' => "Tyre's Labyrinth" ])->campaigns()->saveMany([ $shadowOfTyre, $heartOfTyre, $soulOfTyre ]);

        // characters
        // classes
        // Character::all()->each(function($character) {
        //     $character->classes()->save(CharacterClass::factory()->make());
        // });

        // parties
        // $mawOfAbbadon->party->members()->saveMany([ $maddMorc, $derekDranf, $neve, $ives, $seren ]);
        // $dealsInTheDark->party->members()->saveMany([ $maddMorc, $derekDranf, $neve, $ives, $seren ]);
        // $dualityOfDragons->party->members()->saveMany([ $maddMorc, $derekDranf, $neve, $ives, $seren ]);
        // $meaningOfMadness->party->members()->saveMany([ $maddMorc, $derekDranf, $neve, $ives, $seren ]);
        // $heartOfTyre->party->members()->saveMany([ $maddMorc, $derekDranf, $neve, $ives, $seren ]);
    }

    public function create(array $campaigns): void
    {
        collect($campaigns)->each(function(array $data, string $name) {
            $campaign = Campaign::factory()->create([ 'name' => $name ]);

            collect($data['characters'])->each(function($character) use($campaign) {
                $character = $this->get('characters', $character);
                $campaign->characters()->attach($character);
            });

            $this->set('campaigns', $name, $campaign);
        });
    }
}
