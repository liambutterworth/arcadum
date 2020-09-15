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
            RaceSeeder::class,
            LocationSeeder::class,
            ClassSeeder::class,
            CampaignSeeder::class,
        ]);
    }
}
