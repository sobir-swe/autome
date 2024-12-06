<?php

namespace Database\Seeders;

use App\Models\Lid_reason;
use App\Models\ReasonStatus;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\LidReasonFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ReasonLidSeeder::class,
            ReasonStatusSeeder::class,
            LidSeeder::class,
        ]);
    }
}
