<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class RaceSeeder extends Seeder
{
    public function run()
    {
        $this->create([
            'Dragon' => [],
            'Human' => [ 'parent' => 'dragon' ],
            'Variant Human' => [ 'parent' => 'human' ],
            'Human Illithari' => [ 'parent' => 'human' ],
            'Elf' => [],
            'Half Elf' => [ 'parent' => 'elf' ],
            'Fey' => [],
            'Changling' => [ 'parent' => 'fey' ],
            'Plane Touched' => [],
            'Water Ganasi' => [ 'parent' => 'plane-touched' ],
            'Tiefling' => [],
            'Tiefling Asmodeus' => [ 'parent' => 'tiefling' ],
            'Tiefling Dispatcher' => [ 'parent' => 'tiefling' ],
        ]);
    }

    public function create(array $races): void
    {
        collect($races)->each(function(array $data, string $name) {
            $slug = Str::of($name)->slug();
            $race = Race::factory()->make([ 'name' => $name ]);

            if (Arr::exists($data, 'parent')) {
                $parent = Cache::get('seeders.races.' . $data['parent']);
                $race->parent()->associate($parent);
            }

            $race->save();
            Cache::put("seeders.races.$slug", $race);
        });
    }
}
