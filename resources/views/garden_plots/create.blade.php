@extends('layouts.app')

@section('content')
	<h1 class="text-2xl font-bold mb-4">Add plot to {{ $garden->garden_name }}</h1>
	
	@if ($errors->any())
		<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
			<ul class="list-disc list-inside">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form method="POST" action="{{ route('garden_plots.store', $garden->id) }}" class="bg-white rounded-lg shadow p-6 max-w-md">
		@csrf

		<div class="mb-4">
			<label for="plot_location" class="block font-medium mb-1">Plot Location: </label>
			<input type="text" name="plot_location" id="plot_location" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
		</div>

		<button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">Add Plot</button>
	</form>
@endsection
