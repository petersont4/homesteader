<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garden;
use App\Models\GardenPlot;
use App\Models\Plant;
use App\Models\Harvest;

class HarvestController extends Controller
{
    public function create($gardenId, $plotId, $plantId)
    {
        $garden = Garden::findOrFail($gardenId);
        $plot = GardenPlot::findOrFail($plotId);
        $plant = Plant::findOrFail($plantId);
        return view('harvests.create', ['garden' => $garden, 'plot'=> $plot, 'plant' => $plant]);
    }

    public function store(Request $request, $gardenId, $plotId, $plantId)
    {
        $garden = Garden::findOrFail($gardenId);
        $plot = GardenPlot::findOrFail($plotId);
        $plant = Plant::findOrFail($plantId);

        $validated = $request->validate([
            'weight' => 'required|numeric|min:0|decimal:0,2',
            'harvest_date' => 'required|date',
        ]);

        $validated['plant_id'] = $plant->id;

        Harvest::create($validated);

        return redirect()->route('plants.show', [$gardenId, $plotId, $plantId]);
    }
}
