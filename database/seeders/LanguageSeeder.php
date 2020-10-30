<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Support\Arr;

class LanguageSeeder extends ResourceSeeder
{
    public function run()
    {
        $this->create([
            'Common',
            'Draconic',
            'Dwarven',
            'Elven',
            'Giant',
            'Gnoll',
            'Gnomish',
            'Halfling',
            'Orclin',
            'Sylvan',
            'Cantor',
            'Druidic',
            'Necril',
            "Theives's Cant",
        ]);
    }

    public function create(array $languages): void
    {
        collect($languages)->each(function(string $name) {
            $language = Language::factory()->create([ 'name' => $name ]);
            $this->set('languages', $name, $language);
        });
    }
}
