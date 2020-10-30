<?php

namespace Database\Seeders;

use App\Models\Origin;
use Illuminate\Support\Arr;

class OriginSeeder extends ResourceSeeder
{
    public function run()
    {
        $this->create([
            'Acolyte' => [ 'proficiencies' => ['insight', 'religion'] ],
            'Night Guard Aspirant' => [ 'proficiencies' => ['athletics'], 'location' => 'dolten' ],
        ]);
    }

    public function create(array $origins): void
    {
        collect($origins)->each(function(array $data, string $name) {
            $origin = Origin::factory()->create([ 'name' => $name ]);

            if (Arr::exists($data, 'proficiencies')) {
                $proficiencies = $this->getMany('proficiencies', $data['proficiencies']);
                $origin->proficiencies()->saveMany($proficiencies);
            }

            if (Arr::exists($data, 'location')) {
                $location = $this->get('locations', $data['location']);
                $location->origins()->save($origin);
            }

            $this->set('origins', $name, $origin);
        });
    }
}
