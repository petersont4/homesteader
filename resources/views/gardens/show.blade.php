@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">{{ $garden->garden_name }}</h1>

    <a href="{{ route('garden_plots.create', $garden->id) }}" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 mb-6 inline-block">Add Plot</a>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
        @foreach ($plots as $plot)
            <a href="{{ route('garden_plots.show', [$garden->id, $plot->id]) }}" class="bg-white rounded-lg shadown p-4 border border-gray-200 block hover:shadow-md">
                <h2 class="text-lg font-semibold">{{ $plot->plot_location }}</h2>
            </a>
        @endforeach
    </div>
@endsection