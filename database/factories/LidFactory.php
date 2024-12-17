<?php

namespace Database\Factories;

use App\Models\ReasonStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lid>
 */
class LidFactory extends Factory
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
            'phone_number' => $this->faker->regexify('\+998 (9[0-9]|33|88) \d{3} \d{2} \d{2}'),
            'lid_stage' => $this->faker->randomElement([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]),
            'test_date' => $this->faker->date(),
            'lid_status_id' => ReasonStatus::all()->random()->id,
            'cancel_reason_id' => ReasonStatus::all()->random()->id,
        ];
    }
}
