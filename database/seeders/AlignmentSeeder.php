<?php

namespace Database\Seeders;

use App\Models\Alignment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class AlignmentSeeder extends Seeder
{
    public function run()
    {
        $this->create([
            'Lawful Good',
            'Neutral Good',
            'Chaotic Good',
            'Lawful Neutral',
            'Neutral',
            'Chaotic Neutral',
            'Lawful Evil',
            'Neutral Evil',
            'Chaotic Evil',
        ]);
    }

    public function create(array $names): void
    {
        collect($names)->each(function(string $name) {
            $slug = Str::of($name)->slug();
            $alignment = Alignment::factory()->create([ 'name' => $name ]);
            Cache::put("seeders.alignments.$slug", $alignment);
        });
    }
}
