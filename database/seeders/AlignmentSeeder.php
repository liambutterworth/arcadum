<?php

namespace Database\Seeders;

use App\Models\Alignment;

class AlignmentSeeder extends ResourceSeeder
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
            $alignment = Alignment::factory()->create([ 'name' => $name ]);
            $this->set('alignments', $name, $alignment);
        });
    }
}
