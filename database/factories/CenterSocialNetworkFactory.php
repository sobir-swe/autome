<?php

namespace Database\Factories;

use App\Models\Center;
use App\Models\SocialNetwork;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CenterSocialNetwork>
 */
class CenterSocialNetworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'center_id' => Center::all()->random()->id,
            'social_network_id' => SocialNetwork::all()->random()->id,
            'username' => $this->faker->firstName() . $this->faker->lastName()
        ];
    }
}
