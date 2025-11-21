@extends('layouts.app')

@section('title', 'Berita - HIMATEKKOM ITS')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-black border-b-2 border-yellow-400 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold">Berita</h1>
        <p class="text-xl mt-4 text-gray-300">Informasi terkini seputar HIMATEKKOM ITS</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Filter -->
    <div class="mb-8 flex flex-wrap gap-4">
        <a href="{{ route('news.index') }}" class="px-4 py-2 rounded-lg {{ !request('category') ? 'bg-yellow-400 text-white' : 'bg-white text-gray-300 hover:bg-gray-50' }} transition">
            Semua
        </a>
        @foreach($categories as $cat)
        <a href="{{ route('news.index', ['category' => $cat]) }}" class="px-4 py-2 rounded-lg {{ request('category') == $cat ? 'bg-yellow-400 text-white' : 'bg-white text-gray-300 hover:bg-gray-50' }} transition">
            {{ $cat }}
        </a>
        @endforeach
    </div>

    <!-- News Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($news as $item)
        <article class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            @if($item->featured_image)
            <img src="{{ asset('storage/' . $item->featured_image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
            @else
            <div class="w-full h-48 bg-gradient-to-br from-gray-800 to-gray-900"></div>
            @endif
            
            <div class="p-6">
                @if($item->category)
                <span class="inline-block bg-yellow-400/30 text-yellow-400 text-xs px-3 py-1 rounded-full font-semibold mb-3">
                    {{ $item->category }}
                </span>
                @endif
                
                <h3 class="text-xl font-bold text-white mb-2 hover:text-white transition">
                    <a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>
                </h3>
                
                <p class="text-gray-400 text-sm mb-4">{{ Str::limit($item->excerpt, 120) }}</p>
                
                <div class="flex items-center justify-between text-sm text-gray-500">
                    <span>{{ $item->published_at->format('d M Y') }}</span>
                    <span>{{ $item->views }} views</span>
                </div>
            </div>
        </article>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $news->links() }}
    </div>
</div>
@endsection
