<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SocialNetwork>
 */
class SocialNetworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $platforms = [
            'YouTube' => 'https://youtube.com/',
            'LinkedIn' => 'https://linkedin.com/',
            'Telegram' => 'https://telegram.org/',
            'Instagram' => 'https://instagram.com/',
            'Facebook' => 'https://facebook.com/',
            'Twitter' => 'https://twitter.com/',
            'Google' => 'https://google.com/',
        ];

        $platform = $this->faker->randomElement(array_keys($platforms));

        return [
            'name' => $platform,
            'link' => $platforms[$platform],
        ];
    }
}
