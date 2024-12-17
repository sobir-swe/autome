<?php

namespace Database\Factories;

use App\Models\Center;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
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
            'center_id' => Center::all()->random()->id,
            'address' => $this->faker->address(),
            'call_number' => $this->faker->regexify('\+998 (9[0-9]|33|88) \d{3} \d{2} \d{2}'),
        ];
    }
}
