<?php

namespace Database\Seeders;

use App\Models\Origin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class OriginSeeder extends Seeder
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
            $slug = Str::of($name)->slug();
            $origin = Origin::factory()->create([ 'name' => $name ]);

            if (Arr::exists($data, 'proficiencies')) {
                $proficiencies = collect($data['proficiencies'])->map(function($slug) {
                    return Cache::get("seeders.proficiencies.$slug");
                });

                $origin->proficiencies()->saveMany($proficiencies);
            }

            if (Arr::exists($data, 'location')) {
                $location = Cache::get('seeders.locations.' . $data['location']);
                $location->origins()->save($origin);
            }

            Cache::put("seeders.origins.$slug", $origin);
        });
    }
}
