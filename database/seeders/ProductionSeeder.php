<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductionSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AlignmentSeeder::class,
        ]);
    }
}
