@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('gardens.show', $garden->id) }}" class="text-green-700 hover:underline">{{ $garden->garden_name }}</a>
        <span class="text-gray-500"> > </span>
        <a href="{{ route('garden_plots.show', [$garden->id, $plot->id]) }}" class="text-green-700 hover:underline">{{ $plot->plot_location }}</a>
        <span class="text-gray-500"> > </span>
        <a href="{{ route('plants.show', [$garden->id, $plot->id, $plant->id]) }}" class="text-green-700 hover:underline">{{ $plant->type }}</a>
        <span class="text-gray-500"> > </span>
        <span class="font-semibold">Add Harvest</span>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('harvests.store', [$garden->id, $plot->id, $plant->id]) }}" class="bg-white rounded-lg shadow p-6 max-w-md">
        @csrf

        <div class="mb-4">
            <label for="weight" class="block font-medium mb-1">Weight:</label>
            <input type="number" step="0.01" name="weight" id="weight" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>

        <div class="mb-4">
            <label for="harvest_date" class="block font-medium mb-1">Harvest Date: </label>
            <input type="datetime-local" name="harvest_date" step="1" id="harvest_date" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600" value="{{ now()->format('Y-m-d\TH:i:s') }}">
        </div>

        <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">Record Harvest</button>
    </form>
@endsection