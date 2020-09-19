<?php

namespace Database\Seeders;

use App\Models\Feat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class FeatSeeder extends Seeder
{
    public function run()
    {
        $this->create([
            'Grappler' => [ 'race' => 'human', 'required_abilities' => 'strength>13' ],
            'Dragonmark of Making' => [ 'race' => 'elf' ],
        ]);
    }

    public function create(array $feats): void
    {
        collect($feats)->each(function(array $data, string $name) {
            $slug = Str::of($name)->slug();
            $stats = Arr::exists($data, 'required_abilities') ? $data['required_abilities'] : null;
            $feat = Feat::factory()->create([ 'name' => $name, 'required_abilities' => $stats ]);

            if (Arr::exists($data, 'race')) {
                $race = Cache::get('seeders.races.' . $data['race']);
                $feat->races()->save($race);
            }

            Cache::put("seeders.feats.$slug", $race);
        });
    }
}
