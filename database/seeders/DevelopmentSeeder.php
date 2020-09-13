<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AlignmentSeeder::class,
            CampaignSeeder::class,
            PantheonSeeder::class,
            PlanetSeeder::class,
            RaceSeeder::class,
            SeriesSeeder::class,
        ]);
    }
}
