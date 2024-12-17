<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentResponsible>
 */
class StudentResponsibleFactory extends Factory
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
            'student_id' => Student::all()->random()->id,
            'password' => $this->faker->password(),
            'relation_type' => $this->faker->randomElement(['father', 'mother', 'child', 'uncle', 'grandmother', 'grandfather']),
            'email' => $this->faker->unique()->safeEmail(),
            'first_number' => $this->faker->regexify('\+998 (9[0-9]|33|88) \d{3} \d{2} \d{2}'),
            'second_number' => $this->faker->regexify('\+998 (9[0-9]|33|88) \d{3} \d{2} \d{2}'),
        ];
    }
}
