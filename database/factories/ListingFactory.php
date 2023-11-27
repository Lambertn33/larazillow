<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'beds' => fake()->numberBetween(1, 8),
            'baths' => fake()->numberBetween(1, 8),
            'area' => fake()->numberBetween(30, 800),

            'city' => fake()->city(),
            'code' => fake()->postcode(),
            'street' => fake()->streetName(),
            'street_no' => fake()->numberBetween(100, 2000),
            'price' => fake()->numberBetween(50_000, 2_000_000)
        ];
    }
}
