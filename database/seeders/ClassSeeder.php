<?php

namespace Database\Seeders;

use App\Models\ClassArchetype;
use App\Models\ClassFeature;
use App\Models\ClassLevel;
use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ClassSeeder extends Seeder
{
    public function run()
    {
        $this->createTypes([
            'Barbarian' => [
                'features' => [
                    'Rage' => [ 'level_requirement' => 1 ],
                    'Unarmored Defense' => [ 'level_requirement' => 1 ],
                ],

                'levels' => [
                    [ 'level' => 1, 'proficiency_bonus' => 2, 'rages' => 2, 'rage_damage' => 2 ],
                    [ 'level' => 2, 'proficiency_bonus' => 2, 'rages' => 2, 'rage_damage' => 2 ],
                    [ 'level' => 3, 'proficiency_bonus' => 2, 'rages' => 3, 'rage_damage' => 2 ],
                ],
            ],

            // 'Bard',
            // 'Cleric',
            // 'Druid',
            // 'Fighter',
            // 'Monk',
            // 'Paladin',
            // 'Ranger',
            // 'Rogue',
            // 'Sorcerer',
            // 'Warlock',
            // 'Wizard',
        ]);

        $this->createArchetypes([
            'Berserker' => [
                'type' => 'barbarian',

                'features' => [
                    'Frenzy' => [ 'level_requirement' => 3 ],
                ],
            ],
        ]);
    }

    public function createTypes(array $types): void
    {
        collect($types)->each(function(array $data, string $name) {
            $slug = Str::of($name)->slug();
            $type = ClassType::factory()->create([ 'name' => $name ]);
            $this->createFeatures($type, $data['features']);
            $this->createLevels($type, $data['levels']);
            Cache::put("seeders.class-types.$slug", $type);
        });
    }

    public function createArchetypes(array $archetypes): void
    {
        collect($archetypes)->each(function(array $data, string $name) {
            $slug = Str::of($name)->slug();
            $type = Cache::get('seeders.class-types.' . $data['type']);
            $archetype = ClassArchetype::factory()->make([ 'name' => $name ]);
            $archetype->type()->associate($type);
            $archetype->save();
            $this->createFeatures($archetype, $data['features']);
            Cache::put("seeders.class-archetypes.$slug", $archetype);
        });
    }

    public function createFeatures($type, array $features)
    {
        collect($features)->each(function(array $data, string $name) use($type) {
            $slug = Str::of($name)->slug();
            $feature = ClassFeature::factory()->make($data);
            $type->features()->save($feature);
            Cache::put("seeders.class-features.$slug", $feature);
        });
    }

    public function createLevels($type, array $levels): void
    {
        collect($levels)->each(function(array $data) use($type) {
            $level = ClassLevel::factory()->make($data);
            $type->levels()->save($level);
        });
    }
}
