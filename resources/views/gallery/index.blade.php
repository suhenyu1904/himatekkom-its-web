@extends('layouts.app')

@section('title', 'Galeri - HIMATEKKOM ITS')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-black border-b-2 border-yellow-400 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold">Galeri</h1>
        <p class="text-xl mt-4 text-gray-300">Dokumentasi kegiatan HIMATEKKOM ITS</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($galleries as $gallery)
        <a href="{{ route('gallery.show', $gallery->slug) }}" class="group">
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                @if($gallery->images->first())
                <img src="{{ $gallery->images->first()->image }}" alt="{{ $gallery->title }}" class="w-full h-64 object-cover group-hover:scale-105 transition duration-300">
                @else
                <div class="w-full h-64 bg-gradient-to-br from-blue-400 to-purple-600"></div>
                @endif
                
                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-2 group-hover:text-white transition">
                        {{ $gallery->title }}
                    </h3>
                    
                    @if($gallery->description)
                    <p class="text-gray-400 text-sm mb-3">{{ Str::limit($gallery->description, 100) }}</p>
                    @endif
                    
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        @if($gallery->date)
                        <span>{{ $gallery->date->format('d M Y') }}</span>
                        @endif
                        <span>{{ $gallery->images->count() }} foto</span>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $galleries->links() }}
    </div>
</div>
@endsection
