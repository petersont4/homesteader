<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garden;
use App\Models\GardenPlot;


class GardenPlotController extends Controller
{
    public function create($gardenId)
    {
        $garden = Garden::findOrFail($gardenId);
        return view('garden_plots.create', ['garden' => $garden]);
    }

    public function store(Request $request, $gardenId)
    {
        $garden = Garden::findOrFail($gardenId);

        $validated = $request->validate([
            'plot_location' => 'required|string|max:255',
        ]);

        $validated['plot_garden'] = $garden->id;

        GardenPlot::create($validated);

        return redirect()->route('gardens.show', $gardenId);
    }

    public function show($gardenId, $plotId)
    {
        $garden = Garden::findOrFail($gardenId);
        $plot = GardenPlot::findOrFail($plotId);
        $plants = $plot->plants;

        return view('garden_plots.show', [
            'garden' => $garden,
            'plot' => $plot,
            'plants' => $plants,
        ]);
    }
}
