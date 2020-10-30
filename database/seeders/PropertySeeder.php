<?php

namespace Database\Seeders;

use App\Models\Property;

class PropertySeeder extends ResourceSeeder
{
    public function run()
    {
        $this->create([
            'Some House' => [ 'location' => 'dolten' ],
        ]);
    }

    public function create(array $properties): void
    {
        collect($properties)->each(function(array $data, string $name) {
            $property = Property::factory()->make([ 'name' => $name ]);
            $location = $this->get('locations', $data['location']);
            $property->location()->associate($location);
            $property->save();
            $this->set('properties', $name, $property);
        });
    }
}
