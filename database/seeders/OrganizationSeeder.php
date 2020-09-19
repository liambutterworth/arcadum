<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\OrganizationCategory;
use App\Models\OrganizationType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class OrganizationSeeder extends Seeder
{
    public function run()
    {
        $this->createTypes([
            'Company',
            'Faction',
            'Government',
        ]);

        $this->createCategories([
            'Commerce',
            'Criminal',
            'Exploration',
            'Magic',
            'Martial',
            'Political',
            'Secret',
        ]);

        $this->create([
            'The Collector' => [ 'type' => 'faction', 'category' => 'commerce' ],
            'The Great Bazaar' => [ 'type' => 'faction', 'category' => 'commerce' ],
            'The Freemen' => [ 'type' => 'faction', 'category' => 'commerce' ],
            'The Grasping Hand' => [ 'type' => 'faction', 'category' => 'commerce' ],
            'The Forked Tongue' => [ 'type' => 'faction', 'category' => 'commerce' ],
            'The Steton Striders' => [ 'type' => 'faction', 'category' => 'exploration' ],
            'The World Wanderers' => [ 'type' => 'faction', 'category' => 'exploration' ],
            'The Linorm Lords' => [ 'type' => 'faction', 'category' => 'exploration' ],
            'The Great Coven' => [ 'type' => 'faction', 'category' => 'magic' ],
            'The Last Grove' => [ 'type' => 'faction', 'category' => 'magic' ],
            'The Mages Guild' => [ 'type' => 'faction', 'category' => 'magic' ],
            'The Watch Wall' => [ 'type' => 'faction', 'category' => 'martial' ],
            'The Crown Sworn' => [ 'type' => 'faction', 'category' => 'martial' ],
            'The Hkari' => [ 'type' => 'faction', 'category' => 'martial' ],
            'The Steel Saints' => [ 'type' => 'faction', 'category' => 'martial' ],
            'Krazaxian Government' => [ 'type' => 'faction', 'category' => 'political' ],
            'The Bards College' => [ 'type' => 'faction', 'category' => 'political' ],
            'The Inquisition' => [ 'type' => 'faction', 'category' => 'political' ],
            'The Iitanas Imperium' => [ 'type' => 'faction', 'category' => 'political' ],
            'The Night Guard' => [ 'type' => 'faction', 'category' => 'political' ],
            'The Ever Eye' => [ 'type' => 'faction', 'category' => 'secret' ],
        ]);
    }

    public function createTypes(array $types): void
    {
        collect($types)->each(function(string $name) {
            $slug = Str::of($name)->slug();
            $type = OrganizationType::factory()->create([ 'name' => $name ]);
            Cache::put("seeders.organization-types.$slug", $type);
        });
    }

    public function createCategories(array $categories): void
    {
        collect($categories)->each(function(string $name) {
            $slug = Str::of($name)->slug();
            $type = OrganizationCategory::factory()->create([ 'name' => $name ]);
            Cache::put("seeders.organization-categories.$slug", $type);
        });
    }

    public function create(array $organizations): void
    {
        collect($organizations)->each(function(array $data, string $name) {
            $slug = Str::of($name)->slug();
            $category = Cache::get('seeders.organization-categories.' . $data['category']);
            $type = Cache::get('seeders.organization-types.' . $data['type']);
            $organization = Organization::factory()->make([ 'name' => $name ]);
            $organization->category()->associate($category);
            $organization->type()->associate($type);
            $organization->save();
            Cache::put("seeders.organizations.$slug", $organization);
        });
    }
}
