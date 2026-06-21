@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Eggs</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($eggs as $egg)
            <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
                <h2 class="text-lg font-semibold">{{ $egg->chicken->chicken_identifier }}</h2>
                <p class="text-gray-600">Color: {{ $egg->egg_color }}</p>
                <p class="text-sm text-gray-500">Laid: {{ $egg->laid_date_time }}</p>
                <p class="text-sm text-gray-500">{{ $egg->good_egg ? 'Good egg' : 'Bad egg' }}</p>
                @if ($egg->notes)
                    <p class="text-sm text-gray-500 italic">{{ $egg->notes }}</p>
                @endif
            </div>
        @endforeach
    </div>
@endsection
