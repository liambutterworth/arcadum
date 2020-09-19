<?php

namespace Database\Seeders;

use App\Models\Background;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class BackgroundSeeder extends Seeder
{
    public function run()
    {
        $this->create([
            'Acolyte' => [ 'proficiencies' => ['insight', 'religion'] ],
            'Night Guard Aspirant' => [ 'proficiencies' => ['athletics'], 'location' => 'dolten' ],
        ]);
    }

    public function create(array $backgrounds): void
    {
        collect($backgrounds)->each(function(array $data, string $name) {
            $slug = Str::of($name)->slug();
            $background = Background::factory()->create([ 'name' => $name ]);

            if (Arr::exists($data, 'proficiencies')) {
                $proficiencies = collect($data['proficiencies'])->map(function($slug) {
                    return Cache::get("seeders.proficiencies.$slug");
                });

                $background->proficiencies()->saveMany($proficiencies);
            }

            if (Arr::exists($data, 'location')) {
                $location = Cache::get('seeders.locations.' . $data['location']);
                $location->backgrounds()->save($background);
            }

            Cache::put("seeders.backgrounds.$slug", $background);
        });
    }
}
