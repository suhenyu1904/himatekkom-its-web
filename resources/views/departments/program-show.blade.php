@extends('layouts.app')

@section('title', $program->title . ' - ' . $department->name . ' - HIMATEKKOM ITS')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-black via-gray-900 to-black text-white overflow-hidden py-20">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-400 via-transparent to-yellow-400 animate-pulse"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">

        <div class="text-center">
            <!-- Department Icon -->
            @if($department->icon)
            <div class="text-6xl mb-4">{{ $department->icon }}</div>
            @endif

            <!-- Status Badge -->
            <div class="inline-block mb-6">
                <span class="px-6 py-2 rounded-full text-sm font-semibold border-2
                    @if($program->status == 'completed') 
                        bg-green-500/20 text-green-400 border-green-400/50
                    @elseif($program->status == 'ongoing') 
                        bg-blue-500/20 text-blue-400 border-blue-400/50
                    @else 
                        bg-yellow-400/20 text-yellow-400 border-yellow-400/50
                    @endif">
                    {{ strtoupper($program->status) }}
                </span>
            </div>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-extrabold mb-4 bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 bg-clip-text text-transparent">
                {{ $program->title }}
            </h1>

            <!-- Department Tag -->
            <p class="text-xl text-gray-300 mb-2">
                Program Kerja {{ $department->name }}
            </p>

            <!-- Date Range -->
            @if($program->start_date)
            <div class="flex items-center justify-center text-gray-400 text-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ $program->start_date->format('d M Y') }}
                @if($program->end_date) - {{ $program->end_date->format('d M Y') }} @endif
                </span>
            </div>
            @endif
        </div>
    </div>

    <!-- Bottom Wave -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#000000"/>
        </svg>
    </div>
</section>

<!-- Featured Image -->
@if($program->image || $program->image_1 || $program->image_2 || $program->image_3)
<section class="py-16 bg-black">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-2xl overflow-hidden border-2 border-yellow-400/30">
            @php
                $images = array_filter([
                    $program->image_1,
                    $program->image_2,
                    $program->image_3,
                ]);
            @endphp

            @if(count($images) > 0)
                <!-- Image Slider -->
                <div class="relative" x-data="{ currentSlide: 0, totalSlides: {{ count($images) }} }">
                    <!-- Slider Container -->
                    <div class="overflow-hidden">
                        <div class="flex transition-transform duration-500 ease-out" 
                             :style="`transform: translateX(-${currentSlide * 100}%)`">
                            @foreach($images as $image)
                            <div class="w-full flex-shrink-0">
                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $program->title }}" class="w-full h-96 object-cover">
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Navigation Arrows -->
                    <button @click="currentSlide = currentSlide === 0 ? totalSlides - 1 : currentSlide - 1" 
                            class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/70 hover:bg-black text-yellow-400 p-3 rounded-full transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button @click="currentSlide = currentSlide === totalSlides - 1 ? 0 : currentSlide + 1" 
                            class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/70 hover:bg-black text-yellow-400 p-3 rounded-full transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <!-- Dots Navigation -->
                    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
                        <template x-for="i in totalSlides" :key="i">
                            <button @click="currentSlide = i - 1" 
                                    :class="currentSlide === i - 1 ? 'bg-yellow-400 w-8' : 'bg-white/50 w-2'" 
                                    class="h-2 rounded-full transition-all"></button>
                        </template>
                    </div>

                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent pointer-events-none"></div>
                </div>
            @elseif($program->image)
                <!-- Single Image -->
                <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="w-full h-96 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- Program Description -->
<section class="py-16 bg-gradient-to-br from-gray-900 to-black">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gradient-to-br from-black to-gray-900 rounded-2xl p-8 md:p-12 border-2 border-yellow-400/30">
            <div class="flex items-center mb-8">
                <div class="text-5xl mr-4">📋</div>
                <h2 class="text-3xl font-bold text-yellow-400">Deskripsi Program</h2>
            </div>
            <div class="h-1 w-24 bg-gradient-to-r from-yellow-400 to-transparent mb-8"></div>
            
            <div class="prose prose-lg prose-invert max-w-none">
                <p class="text-gray-300 leading-relaxed text-lg">
                    {{ $program->description }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Program Details -->
<section class="py-16 bg-black">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Timeline -->
            <div class="bg-gradient-to-br from-gray-900 to-black rounded-xl p-6 border-2 border-yellow-400/30 hover:border-gray-400 transition">
                <div class="text-4xl mb-4 text-center">📅</div>
                <h3 class="text-xl font-bold text-yellow-400 mb-4 text-center">Timeline</h3>
                <div class="space-y-2 text-gray-300 text-sm">
                    @if($program->start_date)
                    <div class="flex justify-between">
                        <span class="text-gray-400">Mulai:</span>
                        <span class="font-semibold">{{ $program->start_date->format('d M Y') }}</span>
                    </div>
                    @endif
                    @if($program->end_date)
                    <div class="flex justify-between">
                        <span class="text-gray-400">Selesai:</span>
                        <span class="font-semibold">{{ $program->end_date->format('d M Y') }}</span>
                    </div>
                    @endif
                    @if($program->start_date && $program->end_date)
                    <div class="flex justify-between pt-2 border-t border-yellow-400/20">
                        <span class="text-gray-400">Durasi:</span>
                        <span class="font-semibold">{{ $program->start_date->diffInDays($program->end_date) }} hari</span>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Status -->
            <div class="bg-gradient-to-br from-gray-900 to-black rounded-xl p-6 border-2 border-yellow-400/30 hover:border-gray-400 transition">
                <div class="text-4xl mb-4 text-center">📊</div>
                <h3 class="text-xl font-bold text-yellow-400 mb-4 text-center">Status</h3>
                <div class="text-center">
                    <div class="inline-block px-6 py-3 rounded-full text-lg font-bold border-2
                        @if($program->status == 'completed') 
                            bg-green-500/20 text-green-400 border-green-400/50
                        @elseif($program->status == 'ongoing') 
                            bg-blue-500/20 text-blue-400 border-blue-400/50
                        @else 
                            bg-yellow-400/20 text-yellow-400 border-yellow-400/50
                        @endif">
                        @if($program->status == 'completed')
                            ✓ Selesai
                        @elseif($program->status == 'ongoing')
                            ⟳ Berlangsung
                        @else
                            ◷ Direncanakan
                        @endif
                    </div>
                </div>
            </div>

            <!-- Department -->
            <div class="bg-gradient-to-br from-gray-900 to-black rounded-xl p-6 border-2 border-yellow-400/30 hover:border-gray-400 transition">
                <div class="text-4xl mb-4 text-center">{{ $department->icon }}</div>
                <h3 class="text-xl font-bold text-yellow-400 mb-4 text-center">Departemen</h3>
                <div class="text-center">
                    <a href="{{ route('departments.show', $department->slug) }}" class="inline-block px-4 py-2 bg-yellow-400 text-black rounded-lg font-semibold hover:bg-yellow-400 transition">
                        {{ $department->name }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-yellow-400 to-yellow-600">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-black mb-4">
            Tertarik dengan Program Ini?
        </h2>
        <p class="text-white text-lg mb-8 max-w-2xl mx-auto">
            Hubungi departemen {{ $department->name }} untuk informasi lebih lanjut
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('departments.show', $department->slug) }}" class="inline-block bg-black text-yellow-400 px-8 py-4 rounded-lg font-bold hover:bg-gray-900 transition shadow-xl border-2 border-black">
                Lihat Program Lain
            </a>
            <a href="{{ route('contact.index') }}" class="inline-block bg-white text-black px-8 py-4 rounded-lg font-bold hover:bg-gray-100 transition shadow-xl border-2 border-white">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>
@endsection
