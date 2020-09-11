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
        if (app()->environment('production')) {
            $this->call(ProductionSeeder:class);
        } else{
            $this->call(LocalSeeder::class);
        }
    }
}
