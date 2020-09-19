<?php

namespace Database\Seeders;

use App\Models\Proficiency;
use App\Models\ProficiencyType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ProficiencySeeder extends Seeder
{
    public function run()
    {
        $this->createTypes([
            'Armor',
            'Weapon',
            'Tools',
            'Saving Throw',
            'Skill',
        ]);

        $this->create([
            'Light Armor' => [ 'type' => 'armor' ],
            'Medium Armor' => [ 'type' => 'armor' ],
            'Heavy Armor' => [ 'type' => 'armor' ],
            'Shields' => [ 'type' => 'armor' ],
            'Simple Weapons' => [ 'type' => 'weapon' ],
            'Martial Weapons' => [ 'type' => 'weapon' ],
            'Hand Crossbows' => [ 'type' => 'weapon' ],
            'Light Crossbows' => [ 'type' => 'weapon' ],
            'Longswords' => [ 'type' => 'weapon' ],
            'Rapiers' => [ 'type' => 'weapon' ],
            'Short Swords' => [ 'type' => 'weapon' ],
            'Clubs' => [ 'type' => 'weapon' ],
            'Daggers' => [ 'type' => 'weapon' ],
            'Darts' => [ 'type' => 'weapon' ],
            'Javelins' => [ 'type' => 'weapon' ],
            'Maces' => [ 'type' => 'weapon' ],
            'Quarterstaffes' => [ 'type' => 'weapon' ],
            'Scimitars' => [ 'type' => 'weapon' ],
            'Sickles' => [ 'type' => 'weapon' ],
            'Slings' => [ 'type' => 'weapon' ],
            'Spears' => [ 'type' => 'weapon' ],
            "Thieve's Tools" => [ 'type' => 'tools' ],
            "Tinker's Tools" => [ 'type' => 'tools' ],
            "Artisan's Tools" => [ 'type' => 'tools' ],
            'Musical Instruments' => [ 'type' => 'tools' ],
            'Strength' => [ 'type' => 'saving-throw' ],
            'Dexterity' => [ 'type' => 'saving-throw' ],
            'Intelligence' => [ 'type' => 'saving-throw' ],
            'Wisdom' => [ 'type' => 'saving-throw' ],
            'Charisma' => [ 'type' => 'saving-throw' ],
            'Constitution' => [ 'type' => 'saving-throw' ],
            'Athletics' => [ 'type' => 'skill' ],
            'Acrobatics' => [ 'type' => 'skill' ],
            'Sleight of Hand' => [ 'type' => 'skill' ],
            'Stealth' => [ 'type' => 'skill' ],
            'Arcana' => [ 'type' => 'skill' ],
            'History' => [ 'type' => 'skill' ],
            'Investigation' => [ 'type' => 'skill' ],
            'Nature' => [ 'type' => 'skill' ],
            'Religion' => [ 'type' => 'skill' ],
            'Animal Handling' => [ 'type' => 'skill' ],
            'Insight' => [ 'type' => 'skill' ],
            'Medicine' => [ 'type' => 'skill' ],
            'Perception' => [ 'type' => 'skill' ],
            'Survival' => [ 'type' => 'skill' ],
            'Deception' => [ 'type' => 'skill' ],
            'Intimidation' => [ 'type' => 'skill' ],
            'Performance' => [ 'type' => 'skill' ],
            'Persuasion' => [ 'type' => 'skill' ],
        ]);
    }

    public function createTypes(array $types): void
    {
        collect($types)->each(function(string $name) {
            $slug = Str::of($name)->slug();
            $type = ProficiencyType::factory()->create([ 'name' => $name ]);
            Cache::put("seeders.proficiency-types.$slug", $type);
        });
    }

    public function create(array $proficiencies): void
    {
        collect($proficiencies)->each(function(array $data, string $name) {
            $slug = Str::of($name)->slug();
            $type = Cache::get('seeders.proficiency-types.' . $data['type']);
            $proficiency = Proficiency::factory()->make([ 'name' => $name ]);
            $proficiency->type()->associate($type);
            $proficiency->save();
            Cache::put("seeders.proficiencies.$slug", $proficiency);
        });
    }
}
