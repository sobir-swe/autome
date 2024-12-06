<?php

namespace Database\Seeders;

use App\Models\CenterSocialNetwork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CenterSocialNetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CenterSocialNetwork::factory()->count(20)->create();
    }
}
