<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'stage' => $this->faker->numberBetween(1, 5),
            'lesson_continuous' => $this->faker->numberBetween(0, 1),
            'weekday' => $this->faker->numberBetween(1, 7),
            'branch_id' => Branch::all()->random()->id,
        ];
    }
}
