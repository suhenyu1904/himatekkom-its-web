@extends('layouts.app')

@section('title', 'Event - HIMATEKKOM ITS')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-black border-b-2 border-yellow-400 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold">Event</h1>
        <p class="text-xl mt-4 text-gray-300">Kegiatan dan acara HIMATEKKOM ITS</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($events as $event)
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            @if($event->featured_image)
            <img src="{{ asset('storage/' . $event->featured_image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
            @else
            <div class="w-full h-48 bg-gradient-to-br from-purple-400 to-pink-600"></div>
            @endif
            
            <div class="p-6">
                <div class="flex items-center text-sm text-gray-500 mb-3">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    {{ $event->start_date->format('d M Y') }}
                </div>
                
                <h3 class="text-xl font-bold text-white mb-2 transition">
                    <a href="{{ route('events.show', $event->slug) }}">{{ $event->title }}</a>
                </h3>
                
                <p class="text-gray-400 text-sm mb-4">{{ Str::limit($event->description, 100) }}</p>
                
                @if($event->location)
                <div class="flex items-center text-sm text-gray-500 mb-2">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                    {{ $event->location }}
                </div>
                @endif
                
                @if($event->department)
                <div class="text-sm text-yellow-400 font-semibold">
                    {{ $event->department->name }}
                </div>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $events->links() }}
    </div>
</div>
@endsection
