<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garden;

class GardenController extends Controller
{
    public function index()
    {
        $gardens = Garden::all();

        return view('gardens.index', ['gardens' => $gardens]);
    }

    public function create()
    {
        return view('gardens.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'garden_name' => 'required|string|max:255',
        ]);

        $garden = Garden::create($validated);

        return redirect()->route('gardens.index');
    }

    public function show($id)
    {
        $garden = Garden::findOrFail($id);
        $plots = $garden->gardenPlots;
        return view('gardens.show', ['garden'=> $garden, 'plots' => $plots]);
    }
}
