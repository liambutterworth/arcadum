<?php

namespace Database\Seeders;

use App\Models\Campaign;
use Illuminate\Database\Seeder;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campaign::factory()->create([ 'name' => 'Broken Bonds' ]);
        Campaign::factory()->create([ 'name' => 'Strange Roads' ]);
        Campaign::factory()->create([ 'name' => 'Death and Debts' ]);
        Campaign::factory()->create([ 'name' => 'Wonders Within' ]);
        Campaign::factory()->create([ 'name' => 'Silent Knights' ]);
        Campaign::factory()->create([ 'name' => 'Trouble in Trisden' ]);
        Campaign::factory()->create([ 'name' => 'Beyond the Veil' ]);
        Campaign::factory()->create([ 'name' => 'Wicked Ways' ]);
    }
}
