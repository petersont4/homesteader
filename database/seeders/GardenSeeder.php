<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Garden;
use App\Models\GardenPlot;
use App\Models\Plant;
use App\Models\Harvest;

class GardenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gardens = Garden::factory(3)->create();

$gardens->each(function ($garden) {
    $gardenCount = fake()->numberBetween(2, 6);
    $plots = GardenPlot::factory($gardenCount)->for($garden, 'garden')->create();
    $plots->each(function ($plot) {
        $plotCount = fake()->numberBetween(5, 50);
        $plants = Plant::factory($plotCount)->for($plot, 'garden')->create();

        $plants->each(function ($plant) {
            $harvestCount = fake()->numberBetween(0, 10);
            Harvest::factory($harvestCount)->for($plant, 'plants')->create();
        });
    });
});

    }
}
