<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donator>
 */
class DonatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "Name" => $this->faker->name(),
            "Email" => $this->faker->email(),
            "Amount" => random_int(1, 10000),
            "Message" => $this->faker->text(),
        ];
    }
}
