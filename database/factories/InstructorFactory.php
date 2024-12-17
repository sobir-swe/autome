<?php

namespace Database\Factories;

use App\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'branch_id' => Branch::all()->random()->id,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => $this->faker->password(),
            'phone_number' => $this->faker->regexify('\+998 (9[0-9]|33|88) \d{3} \d{2} \d{2}'),
        ];
    }
}
