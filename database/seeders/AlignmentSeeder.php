<?php

namespace Database\Seeders;

use App\Models\Alignment;
use Illuminate\Database\Seeder;

class AlignmentSeeder extends Seeder
{
    public function run()
    {
        Alignment::factory()->create([ 'name' => 'Lawful Good' ]);
        Alignment::factory()->create([ 'name' => 'Neutral Good' ]);
        Alignment::factory()->create([ 'name' => 'Chaotic Good' ]);
        Alignment::factory()->create([ 'name' => 'Lawful Neutral' ]);
        Alignment::factory()->create([ 'name' => 'Neutral' ]);
        Alignment::factory()->create([ 'name' => 'Chaotic Neutral' ]);
        Alignment::factory()->create([ 'name' => 'Lawful Evil' ]);
        Alignment::factory()->create([ 'name' => 'Neutral Evil' ]);
        Alignment::factory()->create([ 'name' => 'Chaotic Evil' ]);
    }
}
