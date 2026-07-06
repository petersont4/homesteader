<?php

namespace Database\Factories;

use App\Models\GardenPlot;
use App\Models\Garden;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<GardenPlot>
 */
class GardenPlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plot_location' => fake()->words(1, true),
            'plot_garden' => Garden::factory(),
        ];
    }
}
