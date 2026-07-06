<?php

namespace Database\Factories;

use App\Models\Harvest;
use App\Models\Plant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Harvest>
 */
class HarvestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plant_id' => Plant::factory(),
            'weight' => fake()->randomFloat(3,0.001,32),
            'harvest_date' => fake()->dateTimeBetween('-1 years', 'now')
        ];
    }
}
