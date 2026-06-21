<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Egg;
use App\Models\Chicken;

class EggController extends Controller
{
    public function index()
		{
			$eggs = Egg::where('created_at', '>=', now()->subHours(24))->get();

			return view('eggs.index', ['eggs' => $eggs]);
		}

		public function create()
		{
			$chickens = Chicken::all();

			return view('eggs.create', ['chickens' => $chickens]);
		}

		public function store(Request $request)
		{
			$validated = $request->validate([
				'laid_by' => 'required|exists:chickens,id',
				'egg_color' => 'required|string|max:25',
				'laid_date_time' => 'required|date',
				'good_egg' => 'sometimes',
				'notes' => 'nullable|string|max:254',
			]);

			$validated['good_egg'] = $request->has('good_egg');

			$egg = Egg::create($validated);

			return redirect()->route('eggs.index');
		}
}	
