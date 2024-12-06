<?php

namespace Database\Seeders;

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
            CenterTypeSeeder::class,
            CenterSeeder::class,
            SocialNetworkSeeder::class,
            CenterSocialNetworkSeeder::class,
            BranchSeeder::class,
        ]);
    }
}
