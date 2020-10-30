<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AlignmentSeeder::class,
            PantheonSeeder::class,
            DeitySeeder::class,
            LocationSeeder::class,
            RaceSeeder::class,
            LanguageSeeder::class,
            FeatSeeder::class,
            ProficiencySeeder::class,
            OrganizationSeeder::class,
            OriginSeeder::class,
            SpellSeeder::class,
            ClassSeeder::class,
            UserSeeder::class,
            CharacterSeeder::class,
            CampaignSeeder::class,
            SeriesSeeder::class,
            PropertySeeder::class,
        ]);
    }
}
