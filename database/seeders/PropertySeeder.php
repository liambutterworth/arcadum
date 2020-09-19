<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
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
            $slug = Str::of($name)->slug();
            $property = Property::factory()->make([ 'name' => $name ]);
            $location = Cache::get('seeders.locations.' . $data['location']);
            $property->location()->associate($location);
            $property->save();
            Cache::put("seeders.properties.$slug", $property);
        });
    }
}
