@extends('layouts.app')

@section('content')
<a href="{{ route('gardens.show', $garden->id) }}">{{ $garden->garden_name }}</a> > {{ $plot->plot_location }}
    <div class="md-4">
        <a href="{{ route('plants.create', [$garden->id, $plot->id]) }}" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 mb-6 inline-block">Add Plant</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
        @foreach ($plants as $plant)
            <a href="{{ route('plants.show', [$garden->id, $plot->id, $plant->id]) }}" class="bg-white rounded-lg shadow p-4 border border-gray-200 block hover:shadow-md">
                <h2 class="text-lg font-semibold">{{ $plant->type }}</h2>
                <p class="text-gray-600">{{ $plant->purchased_type }}</p>
            </a>
        @endforeach
    </div>
@endsection