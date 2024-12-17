<?php

namespace Database\Seeders;

use App\Models\ReasonStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReasonStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReasonStatus::factory()->count(10)->create();
    }
}
