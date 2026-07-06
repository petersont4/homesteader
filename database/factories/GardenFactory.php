<?php

namespace Database\Factories;

use App\Models\Garden;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Garden>
 */
class GardenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'garden_name' => fake()->words(1, true),
        ];
    }
}
