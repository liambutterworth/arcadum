<?php

namespace Database\Seeders;

use App\Models\CharacterClass;
use App\Models\CharacterClassArchetype;
use App\Models\CharacterClassArchetypeLevel;
use App\Models\CharacterClassFeature;
use App\Models\CharacterClassType;
use App\Models\CharacterClassTypeLevel;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    public function run()
    {
        // class types
        $barbarian = CharacterClassType::factory()->create([ 'name' => 'Barbarian' ]);
        $bard = CharacterClassType::factory()->create([ 'name' => 'Bard' ]);
        $cleric = CharacterClassType::factory()->create([ 'name' => 'Cleric' ]);
        $druid = CharacterClassType::factory()->create([ 'name' => 'Druid' ]);
        $figher = CharacterClassType::factory()->create([ 'name' => 'Figher' ]);
        $monk = CharacterClassType::factory()->create([ 'name' => 'Monk' ]);
        $paladin = CharacterClassType::factory()->create([ 'name' => 'Paladin' ]);
        $ranger = CharacterClassType::factory()->create([ 'name' => 'Ranger' ]);
        $rogue = CharacterClassType::factory()->create([ 'name' => 'Rogue' ]);
        $sorcerer = CharacterClassType::factory()->create([ 'name' => 'Sorcerer' ]);
        $warlock = CharacterClassType::factory()->create([ 'name' => 'Warlock' ]);
        $wizard = CharacterClassType::factory()->create([ 'name' => 'Wizard' ]);

        // class type levels
        $barbarian->levels()->save(CharacterClassTypeLevel::factory()->make([ 'level' => 1, 'proficiency_bonus' => 2, 'rages' => 2, 'rage_damage_bonus' => 2 ]));
        $barbarian->levels()->save(CharacterClassTypeLevel::factory()->make([ 'level' => 2, 'proficiency_bonus' => 2, 'rages' => 2, 'rage_damage_bonus' => 2 ]));
        $barbarian->levels()->save(CharacterClassTypeLevel::factory()->make([ 'level' => 3, 'proficiency_bonus' => 2, 'rages' => 2, 'rage_damage_bonus' => 2 ]));
        $barbarian->levels()->save(CharacterClassTypeLevel::factory()->make([ 'level' => 4, 'proficiency_bonus' => 2, 'rages' => 2, 'rage_damage_bonus' => 2 ]));
        $barbarian->levels()->save(CharacterClassTypeLevel::factory()->make([ 'level' => 5, 'proficiency_bonus' => 3, 'rages' => 3, 'rage_damage_bonus' => 2 ]));

        // class archetypes
        $ancestralGuardian = $barbarian->archetypes()->save(CharacterClassArchetype::factory()->make([ 'name' => 'Ancestral Guardian' ]));
        $battleRanger = $barbarian->archetypes()->save(CharacterClassArchetype::factory()->make([ 'name' => 'Battleranger' ]));
        $berserker = $barbarian->archetypes()->save(CharacterClassArchetype::factory()->make([ 'name' => 'Berserker' ]));
        $stormHerald = $barbarian->archetypes()->save(CharacterClassArchetype::factory()->make([ 'name' => 'Storm Herald' ]));
        $totemWarrior = $barbarian->archetypes()->save(CharacterClassArchetype::factory()->make([ 'name' => 'Totem Warrior' ]));
        $zealot = $barbarian->archetypes()->save(CharacterClassArchetype::factory()->make([ 'name' => 'Zealot' ]));

        // class archetype levels
        $berserker->levels()->save(CharacterClassArchetypeLevel::factory()->make([ 'level' => 3 ]));
        $berserker->levels()->save(CharacterClassArchetypeLevel::factory()->make([ 'level' => 6 ]));

        // class features
        $recklessAttack = CharacterClassFeature::factory()->create([ 'name' => 'Reckless Attack' ]);
        $extraAttack = CharacterClassFeature::factory()->create([ 'name' => 'Extra Attack' ]);
        $fastMovement = CharacterClassFeature::factory()->create([ 'name' => 'Fast Movement' ]);
        $frenzy = CharacterClassFeature::factory()->create([ 'name' => 'Frenzy' ]);
        $mindlessRage = CharacterClassFeature::factory()->create([ 'name' => 'Mindless Rage' ]);

        // level features
        $barbarian->level(2)->features()->save($recklessAttack);
        $barbarian->level(5)->features()->save($extraAttack);
        $barbarian->level(5)->features()->save($fastMovement);
        $berserker->level(3)->features()->save($frenzy);
        $berserker->level(6)->features()->save($mindlessRage);
    }
}
