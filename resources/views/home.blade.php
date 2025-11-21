@extends('layouts.app')

@section('title', 'HIMATEKKOM ITS - Beranda')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-black via-gray-900 to-black text-white overflow-hidden">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-400 via-transparent to-yellow-400 animate-pulse"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 relative">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="text-center lg:text-left">
                <!-- Logo -->
                <div class="mb-8 flex justify-center lg:justify-start">
                    <img src="{{ asset('storage/images/logo/biglogo.svg') }}" alt="Logo HIMATEKKOM ITS" class="h-32 w-auto drop-shadow-2xl">
                </div>
                
                <h1 class="text-4xl md:text-6xl font-bold mb-6 bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 bg-clip-text text-transparent">
                    HIMATEKKOM ITS
                </h1>
                <p class="text-xl md:text-2xl mb-4 text-gray-300">
                    Himpunan Mahasiswa Teknik Komputer
                </p>
                <p class="text-lg mb-4 text-gray-400">
                    Institut Teknologi Sepuluh Nopember Surabaya
                </p>
                <p class="text-2xl font-bold mb-8 text-yellow-400">
                    Kabinet Titik Transformasi
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="{{ route('profile.sejarah') }}" class="bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold hover:bg-yellow-400 transition shadow-xl shadow-yellow-400/50">
                        Tentang Kami
                    </a>
                    <a href="{{ route('contact.index') }}" class="bg-black text-yellow-400 px-8 py-3 rounded-lg font-bold hover:bg-gray-900 transition border-2 border-yellow-400 shadow-xl">
                        Hubungi Kami
                    </a>
                </div>
            </div>
            
            <!-- Right Content - Foto Kabinet -->
            <div class="hidden lg:block">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-400/30 to-yellow-600/30 rounded-2xl blur-2xl"></div>
                    <img src="{{ asset('storage/images/kabinet/DJI_20250426103440_0005_D.JPG') }}" 
                         alt="Kabinet Titik Transformasi HIMATEKKOM ITS" 
                         class="relative rounded-2xl shadow-2xl shadow-yellow-400/20 w-full object-cover border-4 border-yellow-400 hover:scale-105 transition duration-500">
                </div>
            </div>
        </div>
        
        <!-- Mobile Foto Kabinet -->
        <div class="lg:hidden mt-12">
            <div class="relative">
                <img src="{{ asset('storage/images/kabinet/DJI_20250426103440_0005_D.JPG') }}" 
                     alt="Kabinet Titik Transformasi HIMATEKKOM ITS" 
                     class="rounded-2xl shadow-2xl shadow-yellow-400/20 w-full object-cover border-4 border-yellow-400">
            </div>
        </div>
    </div>
</section>

<!-- Departments Section -->
<section class="py-16 bg-gradient-to-br from-gray-900 to-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Departemen Kami</h2>
            <p class="text-gray-400">Berbagai departemen yang menunjang kegiatan HIMATEKKOM ITS</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($departments as $dept)
            <a href="{{ route('departments.show', $dept->slug) }}" class="bg-gradient-to-br from-gray-900 to-black rounded-lg shadow-lg hover:shadow-2xl hover:shadow-white/20 transition duration-300 overflow-hidden group border border-yellow-400/20">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-yellow-400 mb-3">{{ $dept->name }}</h3>
                    <p class="text-gray-300 text-sm leading-relaxed">{{ Str::limit($dept->description, 120) }}</p>
                </div>
                <div class="bg-yellow-400/10 px-6 py-3 transition border-t border-yellow-400/20">
                    <span class="text-yellow-400 text-sm font-semibold">Lihat Detail →</span>
                </div>
            </a>
            @endforeach
        </div>
        
        <div class="text-center mt-12">
            <a href="{{ route('departments.index') }}" class="inline-block bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold hover:bg-yellow-400 transition shadow-lg shadow-yellow-400/50">
                Lihat Semua Departemen
            </a>
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section class="py-16 bg-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Berita Terbaru</h2>
                <p class="text-gray-400">Informasi terkini seputar HIMATEKKOM ITS</p>
            </div>
            <a href="{{ route('news.index') }}" class="hidden md:inline-block text-yellow-400 font-semibold hover:text-white">
                Lihat Semua →
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($latestNews->take(6) as $news)
            <article class="bg-gradient-to-br from-gray-900 to-black rounded-lg shadow-lg overflow-hidden hover:shadow-2xl hover:shadow-white/10 transition duration-300 border border-yellow-400/20">
                @if($news->featured_image)
                <img src="{{ asset('storage/' . $news->featured_image) }}" alt="{{ $news->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gradient-to-br from-blue-400 to-blue-600"></div>
                @endif
                
                <div class="p-6">
                    @if($news->category)
                    <span class="inline-block bg-yellow-400/20 text-yellow-400 text-xs px-3 py-1 rounded-full font-semibold mb-3 border border-yellow-400/30">
                        {{ $news->category }}
                    </span>
                    @endif
                    
                    <h3 class="text-xl font-bold text-white mb-2 hover:text-white transition">
                        <a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a>
                    </h3>
                    
                    <p class="text-gray-400 text-sm mb-4">{{ Str::limit($news->excerpt, 120) }}</p>
                    
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <span>{{ $news->published_at->format('d M Y') }}</span>
                        <span>{{ $news->views }} views</span>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        
        <div class="text-center mt-8 md:hidden">
            <a href="{{ route('news.index') }}" class="inline-block bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold hover:bg-yellow-400 transition shadow-lg shadow-yellow-400/50">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- Upcoming Events Section -->
<section class="py-16 bg-gradient-to-br from-gray-900 to-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Event Mendatang</h2>
                <p class="text-gray-400">Jangan lewatkan kegiatan menarik dari HIMATEKKOM ITS</p>
            </div>
            <a href="{{ route('events.index') }}" class="hidden md:inline-block text-yellow-400 font-semibold hover:text-white">
                Lihat Semua →
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($upcomingEvents as $event)
            <div class="bg-gradient-to-br from-gray-900 to-black rounded-lg shadow-lg overflow-hidden hover:shadow-2xl hover:shadow-white/10 transition duration-300 border border-yellow-400/20">
                @if($event->featured_image)
                <img src="{{ asset('storage/' . $event->featured_image) }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gradient-to-br from-purple-400 to-pink-600"></div>
                @endif
                
                <div class="p-6">
                    <div class="flex items-center text-sm text-yellow-400 mb-3">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $event->start_date->format('d M Y') }}
                    </div>
                    
                    <h3 class="text-xl font-bold text-white mb-2 hover:text-white transition">
                        <a href="{{ route('events.show', $event->slug) }}">{{ $event->title }}</a>
                    </h3>
                    
                    <p class="text-gray-400 text-sm mb-4">{{ Str::limit($event->description, 100) }}</p>
                    
                    @if($event->location)
                    <div class="flex items-center text-sm text-gray-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        {{ $event->location }}
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center mt-8">
            <a href="{{ route('events.index') }}" class="inline-block bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold hover:bg-yellow-400 transition shadow-lg shadow-yellow-400/50">
                Lihat Semua Event
            </a>
        </div>
    </div>
</section>

<!-- Gallery Preview Section -->
<section class="py-16 bg-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-12">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Galeri Dokumentasi</h2>
                <p class="text-gray-400">Momen-momen berharga HIMATEKKOM ITS</p>
            </div>
            <a href="{{ route('gallery.index') }}" class="hidden md:inline-block text-yellow-400 font-semibold hover:text-white">
                Lihat Semua →
            </a>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($galleries as $gallery)
                @if($gallery->images->first())
                <a href="{{ route('gallery.show', $gallery->slug) }}" class="group relative overflow-hidden rounded-lg aspect-square">
                    <img src="{{ $gallery->images->first()->image }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end">
                        <p class="text-white font-semibold p-4">{{ $gallery->title }}</p>
                    </div>
                </a>
                @endif
            @endforeach
        </div>
        
        <div class="text-center mt-8">
            <a href="{{ route('gallery.index') }}" class="inline-block bg-yellow-400 text-black px-8 py-3 rounded-lg font-bold hover:bg-yellow-400 transition shadow-lg shadow-yellow-400/50">
                Lihat Galeri Lengkap
            </a>
        </div>
    </div>
</section>
@endsection
