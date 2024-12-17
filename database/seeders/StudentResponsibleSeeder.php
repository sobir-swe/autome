<?php

namespace Database\Seeders;

use App\Models\StudentResponsible;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentResponsibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentResponsible::factory()->count(10)->create();
    }
}
