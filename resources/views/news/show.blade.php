@extends('layouts.app')

@section('title', $news->title . ' - HIMATEKKOM ITS')

@section('content')
<article class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <header class="mb-8">
        @if($news->category)
        <span class="inline-block bg-yellow-400/30 text-yellow-400 text-sm px-4 py-1 rounded-full font-semibold mb-4">
            {{ $news->category }}
        </span>
        @endif
        
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $news->title }}</h1>
        
        <div class="flex items-center text-gray-400 text-sm space-x-4">
            <span>Oleh {{ $news->author->name }}</span>
            <span>•</span>
            <span>{{ $news->published_at->format('d F Y') }}</span>
            <span>•</span>
            <span>{{ $news->views }} views</span>
        </div>
    </header>

    <!-- Featured Image -->
    @if($news->featured_image)
    <div class="mb-8">
        <img src="{{ asset('storage/' . $news->featured_image) }}" alt="{{ $news->title }}" class="w-full rounded-lg shadow-lg">
    </div>
    @endif

    <!-- Content -->
    <div class="prose max-w-none mb-12">
        {!! $news->content !!}
    </div>

    <!-- Related News -->
    @if($relatedNews->count() > 0)
    <div class="border-t pt-8">
        <h2 class="text-2xl font-bold text-white mb-6">Berita Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($relatedNews as $related)
            <a href="{{ route('news.show', $related->slug) }}" class="group">
                @if($related->featured_image)
                <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="w-full h-32 object-cover rounded-lg mb-3">
                @else
                <div class="w-full h-32 bg-gradient-to-br from-gray-800 to-gray-900 rounded-lg mb-3"></div>
                @endif
                <h3 class="font-bold text-white group-hover:text-white transition">{{ $related->title }}</h3>
                <p class="text-sm text-gray-500 mt-1">{{ $related->published_at->format('d M Y') }}</p>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</article>
@endsection
