<?php

namespace Database\Seeders;

use App\Models\Pantheon;

class PantheonSeeder extends ResourceSeeder
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
            $pantheon = Pantheon::factory()->create([ 'name' => $name ]);
            $this->set('pantheons', $name, $pantheon);
        });
    }
}
