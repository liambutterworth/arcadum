<?php

namespace Database\Seeders;

use App\Models\ClassArchetype;
use App\Models\ClassStats;
use App\Models\ClassType;
use App\Models\ClassTypeFeature;
use App\Models\Feature;
use Illuminate\Support\Arr;

class ClassSeeder extends ResourceSeeder
{
    public function run()
    {
        $this->createFeatures([
            'Rage' => [],
            'Unarmored Defense' => [],
            'Danger Sense' => [],
            'Reckless Attack' => [],
            'Primal Path' => [],
            'Frenzy' => [],
        ]);

        $this->createTypes([
            'Barbarian' => [
                'features' => [
                    1 => ['rage'],
                    2 => ['reckless-attack'],
                ],

                'stats' => [
                    [ 'level' => 1, 'proficiency_bonus' => 2, 'rages' => 2, 'rage_damage' => 2 ],
                    [ 'level' => 2, 'proficiency_bonus' => 2, 'rages' => 2, 'rage_damage' => 2 ],
                ],
            ],
        ]);

        $this->createArchetypes([
            'Berserker' => [
                'type' => 'barbarian',

                'features' => [
                    3 => ['frenzy'],
                ],
            ],
        ]);
    }

    public function createFeatures(array $features)
    {
        collect($features)->each(function(array $data, string $name) {
            $feature = Feature::factory()->create([ 'name' => $name ]);
            $this->set('class-features', $name, $feature);
        });
    }

    public function createTypes(array $types): void
    {
        collect($types)->each(function(array $data, string $name) {
            $type = ClassType::factory()->create([ 'name' => $name ]);

            collect($data['features'])->each(function(array $names, int $level) use($type) {
                collect($this->getMany('class-features', $names))->each(function(Feature $feature) use($type, $level) {
                    $type->features()->attach($feature, [ 'level' => $level ]);
                });
            });

            $stats = collect($data['stats'])->map(function(array $data) use($type) {
                return ClassStats::factory()->make($data);
            });

            $type->stats()->saveMany($stats);
            $this->set('class-types', $name, $type);
        });
    }

    public function createArchetypes(array $archetypes): void
    {
        collect($archetypes)->each(function(array $data, string $name) {
            $type = $this->get('class-types', $data['type']);
            $archetype = ClassArchetype::factory()->make([ 'name' => $name ]);
            $archetype->type()->associate($type);
            $archetype->save();

            collect($data['features'])->each(function(array $names, int $level) use($archetype) {
                collect($this->getMany('class-features', $names))->each(function(Feature $feature) use($archetype, $level) {
                    $archetype->features()->attach($feature, [ 'level' => $level ]);
                });
            });

            $this->set('class-archetypes', $name, $type);
        });
    }
}
