@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('gardens.show', $garden->id) }}" class="text-green-700 hover:underline">{{ $garden->garden_name }}</a>
        <span class="text-gray-500"> > </span>
        <a href="{{ route('garden_plots.show', [$garden->id, $plot->id]) }}" class="text-green-700 hover:underline">{{ $plot->plot_location }}</a>
        <span class="text-gray-500"> > </span>
        <span class="font-semibold">Add Plant</span>
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

    <form method="POST" action="{{ route('plants.store', [$garden->id, $plot->id]) }}" class="bg-white rounded-lg shadow p-6 max-w-md">
        @csrf

        <div class="mb-4">
            <label for="type" class="block font-medium mb-1">Plant Type</label>
            <input type="text" name="type" id="type" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>

        <div class="mb-4">
            <label for="purchased_type" class="block font-medium mb-1">Purchased As</label>
            <input type="text" name="purchased_type" id="purchased_type" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>

        <div class="mb-4">
            <label for="purchase_location" class="block font-medium mb-1">Purchase Location</label>
            <input type="text" name="purchase_location" id="purchase_location" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>

        <div class="mb-4">
            <label for="price" class="block font-medium mb-1">Price</label>
            <input type="number" step="0.01" name="price" id="price" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>

        <div class="mb-4">
            <label for="purchase_date" class="block font-medium mb-1">Purchase Date</label>
            <input type="date" name="purchase_date" id="purchase_date" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>

        <div class="mb-4">
            <label for="ground_date" class="block font-medium mb-1">Date Planted</label>
            <input type="date" name="ground_date" id="ground_date" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>

        <div class="mb-4">
            <label for="harvest_unit" class="block font-medium mb-1">Harvest Unit</label>
            <input type="text" name="harvest_unit" id="harvest_unit" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-600">
        </div>

        <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800">Add Plant</button>
    </form>
@endsection