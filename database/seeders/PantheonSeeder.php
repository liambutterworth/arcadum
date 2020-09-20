<?php

namespace Database\Seeders;

use App\Models\Pantheon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class PantheonSeeder extends Seeder
{
    public function run()
    {
        $this->create([
            'White Pantheon',
            'Grey Pantheon',
            'Midguard Pantheon',
            'Green Pantheon',
            'Blue Pantheon',
            'Black Pantheon',
        ]);
    }

    public function create(array $pantheons)
    {
        collect($pantheons)->each(function(string $name) {
            $slug = Str::of($name)->slug();
            $pantheon = Pantheon::factory()->create([ 'name' => $name ]);
            Cache::put("seeders.pantheons.$slug", $pantheon);
        });
    }
}
