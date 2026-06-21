<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chicken;

class ChickenController extends Controller
{
	public function index()
	{
		$chickens = Chicken::all();

		return view ('chickens.index', ['chickens' => $chickens]);
	}

	public function create()
	{
		return view('chickens.create');
	}

	public function store(Request $request)
	{
		$validated = $request->validate([
			'chicken_identifier' => 'required|string|max:255',
			'egg_color' => 'required|string|max:255',
			'breed' => 'required|string|max:20',
			'hatch_date' => 'required|date',
		]);

		$chicken = Chicken::create($validated);

		return redirect('/chickens');
	}
}
