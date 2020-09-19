<?php

namespace Database\Seeders;

use App\Models\Spell;
use App\Models\SpellSchool;
use App\Models\SpellType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class SpellSeeder extends Seeder
{
    public function run()
    {
        $this->createSchools([
            'Abjuration',
            'Conjuration',
            'Conjuration',
            'Divination',
            'Enchanment',
            'Evocation',
            'Illusion',
            'Necromancy',
            'Transmutation',
        ]);

        $this->createTypes([
            '1st Level',
            '2nd Level',
            '3rd Level',
            '4th Level',
            '5th Level',
            '6th Level',
            '7th Level',
            '8th Level',
            '9th Level',
            'Cantrip',
        ]);

        $this->create([
            'Blade Ward' => [ 'school' => 'abjuration', 'type' => 'cantrip' ],
        ]);

        // SpellSchool::factory()->create([ 'name' => 'Abjuration' ])->spells()->saveMany([
        //     Spell::factory()->make([ 'name' => 'Blade Ward' ])->type()->associate($cantrip),
        //     Spell::factory()->make([ 'name' => 'Resistance' ])->type()->associate($cantrip),
        //     Spell::factory()->make([ 'name' => 'Absorb Elements' ])->type()->associate($first),
        //     Spell::factory()->make([ 'name' => 'Alarm' ])->type()->associate($first),
        //     Spell::factory()->make([ 'name' => 'Armor of Agathys' ])->type()->associate($first),
        //     Spell::factory()->make([ 'name' => 'Ceremony' ])->type()->associate($first),
        //     Spell::factory()->make([ 'name' => 'Mage Armor' ])->type()->associate($first),
        //     Spell::factory()->make([ 'name' => 'Protection from Evil and Good' ])->type()->associate($first),
        //     Spell::factory()->make([ 'name' => 'Sanctuary' ])->type()->associate($first),
        //     Spell::factory()->make([ 'name' => 'Shield' ])->type()->associate($first),
        //     Spell::factory()->make([ 'name' => 'Shield of Faith' ])->type()->associate($first),
        //     Spell::factory()->make([ 'name' => 'Snare' ])->type()->associate($first),
        //     Spell::factory()->make([ 'name' => 'Aid' ])->type()->associate($second),
        //     Spell::factory()->make([ 'name' => 'Arcane Lock' ])->type()->associate($second),
        //     Spell::factory()->make([ 'name' => 'Lesser Restoration' ])->type()->associate($second),
        //     Spell::factory()->make([ 'name' => 'Pass without Trace' ])->type()->associate($second),
        //     Spell::factory()->make([ 'name' => 'Protection from Poison' ])->type()->associate($second),
        //     Spell::factory()->make([ 'name' => 'Warding Bond' ])->type()->associate($second),
        //     Spell::factory()->make([ 'name' => 'Beacon of Hope' ])->type()->associate($third),
        //     Spell::factory()->make([ 'name' => 'Counterspell' ])->type()->associate($third),
        //     Spell::factory()->make([ 'name' => 'Dispel Magic' ])->type()->associate($third),
        //     Spell::factory()->make([ 'name' => 'Glyph of Warding' ])->type()->associate($third),
        //     Spell::factory()->make([ 'name' => 'Magic Circle' ])->type()->associate($third),
        //     Spell::factory()->make([ 'name' => 'Nondetection' ])->type()->associate($third),
        //     Spell::factory()->make([ 'name' => 'Protection from Energy' ])->type()->associate($third),
        //     Spell::factory()->make([ 'name' => 'Remove Curse' ])->type()->associate($third),
        //     Spell::factory()->make([ 'name' => 'Aura of Life' ])->type()->associate($fourth),
        //     Spell::factory()->make([ 'name' => 'Aura of Purity' ])->type()->associate($fourth),
        //     Spell::factory()->make([ 'name' => 'Banishment' ])->type()->associate($fourth),
        //     Spell::factory()->make([ 'name' => 'Death Ward' ])->type()->associate($fourth),
        //     Spell::factory()->make([ 'name' => 'Freedom of Movement' ])->type()->associate($fourth),
        //     Spell::factory()->make([ 'name' => "Mordenkainens Private Sanctum" ])->type()->associate($fourth),
        //     Spell::factory()->make([ 'name' => 'Stoneskin' ])->type()->associate($fourth),
        //     Spell::factory()->make([ 'name' => 'Antilife Shell' ])->type()->associate($fifth),
        //     Spell::factory()->make([ 'name' => 'Banishing Smite' ])->type()->associate($fifth),
        //     Spell::factory()->make([ 'name' => 'Circle of Power' ])->type()->associate($fifth),
        //     Spell::factory()->make([ 'name' => 'Dispel Evil and Good' ])->type()->associate($fifth),
        //     Spell::factory()->make([ 'name' => 'Greater Restoration' ])->type()->associate($fifth),
        //     Spell::factory()->make([ 'name' => 'Planar Binding' ])->type()->associate($fifth),
        //     Spell::factory()->make([ 'name' => 'Druid Grove' ])->type()->associate($sixth),
        //     Spell::factory()->make([ 'name' => 'Forbiddance' ])->type()->associate($sixth),
        //     Spell::factory()->make([ 'name' => 'Globe of Invulnerability' ])->type()->associate($sixth),
        //     Spell::factory()->make([ 'name' => 'Guards and Wards' ])->type()->associate($sixth),
        //     Spell::factory()->make([ 'name' => 'Primordial Ward' ])->type()->associate($sixth),
        //     Spell::factory()->make([ 'name' => 'Scatter' ])->type()->associate($sixth),
        //     Spell::factory()->make([ 'name' => 'Symbol' ])->type()->associate($seventh),
        //     Spell::factory()->make([ 'name' => 'Antimagic Field' ])->type()->associate($eighth),
        //     Spell::factory()->make([ 'name' => 'Holy Aura' ])->type()->associate($eighth),
        //     Spell::factory()->make([ 'name' => 'Mind Blank' ])->type()->associate($eighth),
        //     Spell::factory()->make([ 'name' => 'Imprisonment' ])->type()->associate($ninth),
        //     Spell::factory()->make([ 'name' => 'Invulnerability' ])->type()->associate($ninth),
        //     Spell::factory()->make([ 'name' => 'Prismatic Wall' ])->type()->associate($ninth),
        // ]);
    }

    public function createSchools(array $schools): void
    {
        collect($schools)->each(function(string $name) {
            $slug = Str::of($name)->slug();
            $school = SpellSchool::factory()->create([ 'name' => $name ]);
            Cache::put("seeders.spell-schools.$slug", $school);
        });
    }

    public function createTypes(array $types): void
    {
        collect($types)->each(function(string $name) {
            $slug = Str::of($name)->slug();
            $type = SpellType::factory()->create([ 'name' => $name ]);
            Cache::put("seeders.spell-types.$slug", $type);
        });
    }

    public function create(array $spells): void
    {
        collect($spells)->each(function(array $data, string $name) {
            $slug = Str::of($name)->slug();
            $school = Cache::get('seeders.spell-schools.' . $data['school']);
            $type = Cache::get('seeders.spell-types.' . $data['type']);
            $spell = Spell::factory()->make([ 'name' => $name ]);
            $spell->school()->associate($school);
            $spell->type()->associate($type);
            $spell->save();
            Cache::put("seeders.spells.$slug", $spell);
        });
    }
}
