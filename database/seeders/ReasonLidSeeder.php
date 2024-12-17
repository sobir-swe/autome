<?php

namespace Database\Seeders;

use App\Models\ReasonLid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReasonLidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReasonLid::factory()->count(10)->create();
    }
}
