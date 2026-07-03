<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garden;
use App\Models\GardenPlot;
use App\Models\Plant;

class PlantController extends Controller
{
    public function create($gardenId, $plotId)
    {
        $garden = Garden::findOrFail($gardenId);
        $plot = GardenPlot::findOrFail($plotId);
        return view('plants.create', ['garden' => $garden, 'plot' => $plot]);
    }

    public function store(Request $request, $gardenId, $plotId)
    {
        $garden = Garden::findOrFail($gardenId);
        $plot = GardenPlot::findOrFail($plotId);

        $validated = $request->validate([
            'type' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|decimal:0,2',
            'purchase_date' => 'required|date',
            'ground_date' => 'required|date',
            'purchase_location' => 'required|string|max:255',
            'purchased_type' => 'required|string|max:255',
            'harvest_unit' => 'required|string|max:5',
        ]);

        $validated['garden_location'] = $plot->id;

        Plant::create($validated);

        return redirect()->route('garden_plots.show', [$gardenId, $plotId]);
    }

    public function show($gardenId, $plotId, $plantId)
    {
        $garden = Garden::findOrFail($gardenId);
        $plot = GardenPlot::findOrFail($plotId);
        $plant = Plant::findOrFail($plantId);
        $harvests = $plant->harvests;

        return view('plants.show', [
            'garden' => $garden,
            'plot' => $plot,
            'plant' => $plant,
            'harvests' => $harvests
        ]);
    }
}
