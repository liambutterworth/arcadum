<?php

namespace Database\Seeders;

use App\Models\Organization;
use App\Models\OrganizationCategory;
use App\Models\OrganizationType;

class OrganizationSeeder extends ResourceSeeder
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
            $type = OrganizationType::factory()->create([ 'name' => $name ]);
            $this->set('organization-types', $name, $type);
        });
    }

    public function createCategories(array $categories): void
    {
        collect($categories)->each(function(string $name) {
            $category = OrganizationCategory::factory()->create([ 'name' => $name ]);
            $this->set('organization-categories', $name, $category);
        });
    }

    public function create(array $organizations): void
    {
        collect($organizations)->each(function(array $data, string $name) {
            $type = $this->get('organization-types', $data['type']);
            $category = $this->get('organization-categories', $data['category']);
            $organization = Organization::factory()->make([ 'name' => $name ]);
            $organization->category()->associate($category);
            $organization->type()->associate($type);
            $organization->save();
            $this->set('organizations', $name, $organization);
        });
    }
}
