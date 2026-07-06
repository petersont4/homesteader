<?php

namespace Database\Factories;

use App\Models\Egg;
use App\Models\Chicken;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Egg>
 */
class EggFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'laid_by' => Chicken::factory(),
             'egg_color' => fake()->randomElement(['Light Blue', 'Light Brown', 'Olive', 'Chocolate', 'White']),
             'laid_date_time' => fake()->dateTimeBetween('-4 years', 'now'),
             'good_egg' => fake()->boolean(99),
             'notes' => fake()->optional(.05)->sentence(),
        ];
    }
}
