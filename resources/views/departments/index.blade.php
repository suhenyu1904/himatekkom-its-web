@extends('layouts.app')

@section('title', 'Departemen - HIMATEKKOM ITS')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-black via-gray-900 to-black text-white overflow-hidden py-20">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-400 via-transparent to-yellow-400 animate-pulse"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
        <h1 class="text-5xl md:text-6xl font-extrabold mb-6 bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 bg-clip-text text-transparent">
            DEPARTEMEN HIMATEKKOM ITS
        </h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">
            Berbagai departemen yang menjalankan program kerja untuk kemajuan HIMATEKKOM ITS
        </p>
    </div>

    <!-- Bottom Wave -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
        </svg>
    </div>
</section>

<!-- Departments Grid -->
<section class="py-16 bg-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($departments as $dept)
            <a href="{{ route('departments.show', $dept->slug) }}" class="group">
                <div class="bg-gradient-to-br from-gray-900 to-black rounded-2xl overflow-hidden border-2 border-yellow-400/30 hover:border-gray-400 transition-all duration-300 hover:shadow-2xl hover:shadow-white/10 hover:-translate-y-2 h-full">
                    <div class="p-8">
                        <!-- Icon -->
                        @if($dept->icon)
                        <div class="text-7xl mb-6 text-center group-hover:scale-110 transition-transform duration-300">
                            {{ $dept->icon }}
                        </div>
                        @endif
                        
                        <!-- Name -->
                        <h3 class="text-2xl font-bold text-yellow-400 mb-3 text-center transition">
                            {{ $dept->name }}
                        </h3>
                        
                        <!-- Description -->
                        <p class="text-gray-300 text-sm text-center leading-relaxed mb-6">
                            {{ Str::limit($dept->description, 100) }}
                        </p>
                        
                        <!-- Stats -->
                        <div class="flex justify-around text-center border-t border-yellow-400/20 pt-4">
                            <div>
                                <div class="text-yellow-400 font-bold text-xl">{{ $dept->programs->count() }}</div>
                                <div class="text-gray-400 text-xs">Program</div>
                            </div>
                            <div>
                                <div class="text-yellow-400 font-bold text-xl">{{ $dept->members->count() }}</div>
                                <div class="text-gray-400 text-xs">Anggota</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Bottom Accent -->
                    <div class="h-2 bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400"></div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-yellow-400 to-yellow-600">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-black mb-4">
            Ingin Tahu Lebih Lanjut?
        </h2>
        <p class="text-white text-lg mb-8 max-w-2xl mx-auto">
            Klik pada departemen untuk melihat detail program kerja dan anggota
        </p>
        <a href="{{ route('contact.index') }}" class="inline-block bg-black text-yellow-400 px-8 py-4 rounded-lg font-bold hover:bg-gray-900 transition shadow-xl border-2 border-black">
            Hubungi Kami
        </a>
    </div>
</section>
@endsection
