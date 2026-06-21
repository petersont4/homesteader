@extends('layouts.app')

@section('content')
	<h1 class="text-2xl font-bold mb-4">Chickens</h1>

	<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
		@foreach ($chickens as $chicken)
			<div class="bg-white rounded-lg shadow p-4 border border-gray-200">
				<h2 class="text-lg font-semibold">{{ $chicken->chicken_identifier }}</h2>
				<p class="text-gray-600">{{ $chicken->breed }}</p>
				<p class="text-sm text-gray-500">Egg Color: {{ $chicken->egg_color }}</p>
				<p class="text-sm text-gray-500">Hatched {{ $chicken->hatch_date }}</p>
			</div>
		@endforeach
	</div>
@endsection
