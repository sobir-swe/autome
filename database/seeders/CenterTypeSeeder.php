<?php

namespace Database\Seeders;

use App\Models\CenterType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CenterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CenterType::factory()->count(20)->create();
    }
}
