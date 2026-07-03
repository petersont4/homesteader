@extends('layouts.app')

@section('content')
<a href="{{ route('gardens.show', $garden->id) }}">{{ $garden->garden_name }}</a> > <a href="{{ route('garden_plots.show', [$garden->id,$plot->id]) }}">{{ $plot->plot_location }}</a> > {{ $plant->type }}
    <div class="md-4">
        <a href="{{ route('harvests.create', [$garden->id, $plot->id, $plant->id]) }}" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800 mb-6 inline-block">Add Harvest</a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
        @forelse ($harvests as $harvest)
            <div class="bg-white rounded-lg shadow p-4 border border-gray-200 block hover:shadow-md">
                <h2 class="text-lg font-semibold">{{ $harvest->harvest_date }}</h2>
                <p class="text-gray-600">{{ $harvest->weight }} {{ $plant->harvest_unit }}</p>
            </div>
        @empty
             <p class="text-gray-500">No harvests recorded yet.</p>
        @endforelse
    </div>
@endsection