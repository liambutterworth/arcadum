<?php

namespace Database\Seeders;

use App\Models\Character;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment(['production', 'staging'])) {
            $this->call([
                AlignmentSeeder::class,
            ]);
        } else {
            $this->call([
                AlignmentSeeder::class,
                CampaignSeeder::class,
                PantheonSeeder::class,
                RaceSeeder::class,
            ]);
        }
    }
}
