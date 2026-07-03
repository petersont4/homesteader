@extends('layouts.app')

@section('content')
	<h1 class="text-2xl font-bold mb-4">Gardens</h1>

	<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
		@foreach ($gardens as $garden)
			<a href="{{ route('gardens.show', $garden->id) }}" class="bg-white rounded-lg shadow p-4 border border-gray-200 block hover:shadow-lg hover:shadow-green-500/30">
    			<h2 class="text-lg font-semibold">{{ $garden->garden_name }}</h2>
			</a>
		@endforeach
	</div>
@endsection
