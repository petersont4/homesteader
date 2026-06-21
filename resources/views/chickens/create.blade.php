@extends('layouts.app')

@section('content')
	<h1 class="text-2xl font-bold mb-4">Add a Chicken</h1>
	
	@if ($errors->any())
		<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
			<ul class="list-disc list-inside">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form method="POST" action="{{ route('chickens.store') }}" class="bg-white rounded-lg shadow p-6 max-w-md">
		@csrf
		
		<div class="mb-4">
			<label for="chicken_identifier" class="block font-medium mb-1">Identifier</label>
			<input type="text" name="chicken_identifier" id="chicken_identifier" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
		</div>

		<div class="mb-4">
			<label for="egg_color" class="block font-medium mb-1">Egg Color</label>
			<input type="text" name="egg_color" id="egg_color" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
		</div>

		<div class="mb-4">
				<label for="breed" class="block font-medium mb-1">Breed</label>
			 <input type="text" name="breed" id="breed" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
		</div>

		<div class="mb-4">
			<label for="hatch_date" class="block font-medium mb-1">Hatch Date</label>
			<input type="date" name="hatch_date" id="hatch_date" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
		</div>

		<button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">Add Chicken</button>
	</form>
@endsection
