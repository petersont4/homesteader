<?php

namespace Database\Factories;

use App\Models\Plant;
use App\Models\GardenPlot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Plant>
 */
class PlantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['Tomato', 'Cucumber', 'Pumpkin', 'Green Bean', 'Marigold',]),
            'garden_location' => GardenPlot::factory(),
            'price' => fake()->randomFloat(2,0.1,4),
            'purchase_date' => fake()->dateTimeBetween('-1 years', 'now'),
            'ground_date' => fake()->dateTimeBetween('-1 years', 'now'),
            'purchase_location' => fake()->randomElement(['Walmart', 'Home Depot', 'Lowes', 'Tractor Supply']),
            'purchased_type' => fake()->randomElement(['Seed', 'Plant']),
            'harvest_unit' => 'oz'
        ];
    }
}
