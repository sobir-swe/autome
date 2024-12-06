<?php

namespace Database\Seeders;

use App\Models\Lid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lid::factory()->count(10)->create();
    }
}
