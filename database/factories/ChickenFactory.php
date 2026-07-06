<?php

namespace Database\Factories;

use App\Models\Chicken;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Chicken>
 */
class ChickenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'chicken_identifier' => fake()->firstName(),
            'egg_color' => fake()->randomElement(['Light Blue', 'Light Brown', 'Olive', 'Chocolate', 'White']),
            'breed' => fake()->randomElement(['Rhode Island Red', 'Plymouth Barredrock', 'Olive Egger', 'White Leghorn']),
            'hatch_date' => fake()->dateTimeBetween('-4 years', 'now')->format('Y-m-d'),
        ];
    }
}
