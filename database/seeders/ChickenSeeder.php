<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Chicken;
use App\Models\Egg;

class ChickenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chickenCount = fake()->numberBetween(10, 100);
        $chickens = Chicken::factory($chickenCount)->create();
        $chickens->each( function ($chicken) {
            $eggCount = fake()->numberBetween(20, 350);
            Egg::factory($eggCount)->create(['laid_by' => $chicken->id]);
        });
    }
}
