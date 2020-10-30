<?php

namespace Database\Seeders;

use App\Models\Feat;
use Illuminate\Support\Arr;

class FeatSeeder extends ResourceSeeder
{
    public function run()
    {
        $this->create([

            // 5e tools
            'Aberrant Dragonmark' => [],
            'Acrobat' => [],
            'Actor' => [],
            'Alchemist' => [],
            'Alert' => [],
            'Animal Handler' => [],
            'Arcanist' => [],
            'Artificer Initiate' => [],
            'Athlete' => [],
            'Barbed Hide' => [],
            'Blade Mastery' => [],
            'Bountiful Luck' => [],
            'Brawny' => [],
            'Burglar' => [],
            'Charger' => [],
            'Chef' => [],
            'Critter Friend' => [],
            'Crossbow Expert' => [],
            'Crusher' => [],
            'Defensive Duelist' => [],
            'Diplomat' => [],
            'Dragon Fear' => [],
            'Dragon Hide' => [],
            'Dragon Wings' => [],
            'Dragonmark of Detection' => [],
            'Dragonmark of Finding' => [],
            'Dragonmark of Handling' => [],
            'Dragonmark of Healing' => [],
            'Dragonmark of Hospitality' => [],
            'Dragonmark of Making' => [ 'race' => 'elves' ],
            'Dragonmark of Passage' => [],
            'Dragonmark of Scribing' => [],
            'Dragonmark of Sentinel' => [],
            'Dragonmark of Shadow' => [],
            'Dragonmark of Storm' => [],
            'Dragonmark of Warding' => [],
            'Drow High Magic' => [],
            'Dual Wielder' => [],
            'Dungeon Delver' => [],
            'Durable' => [],
            'Dwarf Resilience' => [],
            'Dwarven Fortitude' => [],
            'Eldritch Adept' => [],
            'Elemental Adept' => [],
            'Elven Accuracy' => [],
            'Elven Accuracy' => [],
            'Empathic' => [],
            "Everybody's Friend" => [],
            'Fade Away' => [],
            'Fell Handed' => [],
            'Fey Teleportation' => [],
            'Fey Touched' => [],
            'Fighting Initiate' => [],
            'Flail Mastery' => [],
            'Flames of Phlegethos' => [],
            'Gourmand' => [],
            'Grappler' => [ 'race' => 'human', 'required_abilities' => 'strength>13' ],
            'Great Weapon Master' => [],
            'Grudge-Bearer' => [],
            'Gunner' => [],
            'Healer' => [],
            'Heavily Armored' => [],
            'Heavy Armor Master' => [],
            'Historian' => [],
            'Human Determination' => [],
            'Infernal Constitution' => [],
            'Inspiring Leader' => [],
            'Investigator' => [],
            'Keen Mind' => [],
            'Lightly Armored' => [],
            'Linguist' => [],
            'Lucky' => [],
            'Mage Slayer' => [],
            'Magic Initiate' => [],
            'Martial Adept' => [],
            'Master of Disguise' => [],
            'Medic' => [],
            'Medium Armor Master' => [],
            'Menacing' => [],
            'Metabolic Control' => [],
            'Metamagic Adept' => [],
            'Mobile' => [],
            'Moderately Armored' => [],
            'Mounted Combatant' => [],
            'Naturalist' => [],
            'Observant' => [],
            'Orcish Aggression' => [],
            'Orcish Fury' => [],
            'Perceptive' => [],
            'Performer' => [],
            'Piercer' => [],
            'Poisoner' => [],
            'Polearm Master' => [],
            'Practiced Expert' => [],
            'Prodigy' => [],
            'Prodigy' => [],
            'Quick-Fingered' => [],
            'Quicksmithing' => [],
            'Resilient' => [],
            'Revenant Blade' => [],
            'Ritual Caster' => [],
            'Savage Attacker' => [],
            'Second Chance' => [],
            'Sentinel' => [],
            'Servo Crafting' => [],
            'Shadow Touched' => [],
            'Sharpshooter' => [],
            'Shield Master' => [],
            'Shield Training' => [],
            'Silver-Tongued' => [],
            'Skilled' => [],
            'Skulker' => [],
            'Slasher' => [],
            'Spear Mastery' => [],
            'Spell Sniper' => [],
            'Squat Nimbleness' => [],
            'Stealthy' => [],
            'Survivalist' => [],
            'Svirfneblin Magic' => [],
            'Tandem Tactician' => [],
            'Tavern Brawler' => [],
            'Telekinetic' => [],
            'Telepathic' => [],
            'Theologian' => [],
            'Tough' => [],
            'Tower of Iron Will' => [],
            'Tracker' => [],
            'Vampiric Exultation' => [],
            'War Caster' => [],
            'Warhammer Master' => [],
            'Weapon Master' => [],
            'Wild Talent' => [],
            'Wonder Maker' => [],
            'Wood Elf Magic' => [],

            // world anvil
            'Master Enchanter' => [],
            'Master Scribe' => [],
            'Master Chef' => [],
            'Master Chymist' => [],
            'Whelming Ancestry' => [ 'race' => 'dragonborn' ],
            'Dragon Soul' => [ 'race' => 'dragonborn' ],
            'Iron Will' => [ 'race' => 'duergar' ],
            'Peak Fortitude' => [ 'race' => 'mountain-dwarves' ],
            'Stubborn Dwarves' => [ 'race' => 'hill-dwarves' ],
            'Children of the Feywild' => [ 'race' => 'wood-elves' ],
            'Descendents of the Eldar' => [ 'race' => 'high-elves' ],
            'Lineage of Burden' => [ 'race' => 'drow' ],
            'Paragon of Talent' => [ 'race' => 'half-elves' ],
            'Arcane Imbued' => [ 'race' => 'firbolgs' ],
            'Fortress of Muscles' => [ 'race' => 'goliaths' ],
            'Living Monolith' => [ 'race' => 'firbolgs' ],
            'The Dreamers of Dreams' => [ 'race' => 'forest-gnomes' ],
            'Master Engineer' => [ 'race' => 'rock-gnomes' ],
            'Ode to Wode' => [ 'race' => 'svirfneblins' ],
            'Wanderers of Dreams' => [ 'race' => 'gnomes' ],
            'Battle Reborn' => [ 'races' => ['orcs', 'half-orcs'] ],
            'Fierce Militant' => [ 'race' => 'hobgoblins' ],
            "Fire God's Blessing" => [ 'race' => 'greenskins', 'deities' => ['glory', 'babylon', 'silloway', 'lorita', 'astaroth'] ],
        ]);
    }

    public function create(array $feats): void
    {
        collect($feats)->each(function(array $data, string $name) {
            $feat = Feat::factory()->create([
                'name' => $name,
                'required_abilities' => Arr::get($data, 'required_abilities'),
            ]);

            if (Arr::exists($data, 'race')) {
                $race = $this->get('races', $data['race']);
                if (is_null($race)) dd($race, $data['race']);
                $feat->races()->save($race);
            }

            if (Arr::exists($data, 'races')) {
                $races = $this->getMany('races', $data['races']);
                $feat->races()->saveMany($races);
            }

            if (Arr::exists($data, 'deity')) {
                $deity = $this->get('deities', $data['deity']);
                $feat->deities()->save($deity);
            }

            if (Arr::exists($data, 'deities')) {
                $deities = $this->getMany('deities', $data['deities']);
                $feat->deities()->saveMany($deities);
            }

            $this->set('feats', $name, $feat);
        });
    }
}
