@extends('layouts.app')

@section('content')
	<h1 class="text-2xl font-bold mb-4">Add Egg Collection</h1>
	
	@if ($errors->any())
		<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
			<ul class="list-disc list-inside">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form method="POST" action="{{ route('eggs.store') }}" class="bg-white rounded-lg shadow p-6 max-w-md">
		@csrf
		
		<div class="mb-4">
			<label for="laid_by" class="block font-medium mb-1">Laid By: </label>
			<select name="laid_by" id="laid_by" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
				@foreach ($chickens as $chicken)
					<option value="{{ $chicken->id }}" data-egg-color="{{ $chicken->egg_color }}">{{ $chicken->chicken_identifier }}</option>
				@endforeach
			</select>
		</div>

		<div class="mb-4">
			<label for="egg_color" class="block font-medium mb-1">Egg Color: </label>
			<input type="text" name="egg_color" id="egg_color" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
		</div>

		<div class="mb-4 flex items-center gap-2">
			 <input type="checkbox" name="good_egg" id="good_egg" class="w-5 h-5 text-green-700 border-gray-300 rounded focus:ring-2 focus:ring-green-600" checked>
			 <label for="good_egg" class="font-medium mb-1">Good Egg</label>
		</div>

		<div class="mb-4">
			<label for="laid_date_time" class="block font-medium mb-1">Laid: </label>
			<input type="datetime-local" name="laid_date_time" id="laid_date_time" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" value="{{ now()->format('Y-m-d\TH:i:s') }}" step="1">
		</div>

		<div class="mb-4">
			<label for="notes" class="block font-medium mb-1">Notes: </label>
			<textarea id="notes" name="notes" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"></textarea>
		</div>

		<button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">Record Egg</button>
	</form>
@endsection
