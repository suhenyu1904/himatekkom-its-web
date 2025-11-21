@extends('layouts.app')

@section('title', $department->name . ' - HIMATEKKOM ITS')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-black via-gray-900 to-black text-white overflow-hidden py-20">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-400 via-transparent to-yellow-400 animate-pulse"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">

        <div class="flex items-center justify-center md:justify-start">
            @if($department->icon)
            <div class="text-8xl mr-6 animate-bounce">{{ $department->icon }}</div>
            @endif
            <div class="text-center md:text-left">
                <h1 class="text-5xl md:text-6xl font-extrabold mb-4 bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 bg-clip-text text-transparent">
                    {{ $department->name }}
                </h1>
            </div>
        </div>
    </div>

    <!-- Bottom Wave -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#000000"/>
        </svg>
    </div>
</section>

<!-- Description Section -->
<section class="py-16 bg-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-white mb-4">Deskripsi Departemen</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-yellow-600 mx-auto"></div>
        </div>
        <div class="bg-gradient-to-br from-gray-900 to-black rounded-2xl p-8 md:p-12 border-2 border-yellow-400/30">
            <p class="text-gray-300 leading-relaxed text-lg text-center">
                {{ $department->description }}
            </p>
        </div>
    </div>
</section>

<!-- Members Section -->
@if($department->members->count() > 0)
<section class="py-16 bg-gradient-to-br from-gray-900 to-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-yellow-400 mb-4">Anggota Departemen</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-yellow-600 mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            @foreach($department->members as $member)
            <div class="group bg-gradient-to-br from-black to-gray-900 rounded-xl overflow-hidden border-2 border-yellow-400/30 hover:border-gray-400 transition-all duration-300 hover:shadow-xl hover:shadow-white/10 hover:-translate-y-2">
                <div class="p-6 text-center">
                    <!-- Avatar Placeholder -->
                    <div class="w-24 h-24 bg-gradient-to-br from-yellow-400/20 to-yellow-600/20 rounded-full mx-auto mb-4 flex items-center justify-center border-2 border-yellow-400/50 group-hover:scale-110 transition-transform">
                        <span class="text-4xl">👤</span>
                    </div>
                    
                    <!-- Name -->
                    <h3 class="font-bold text-white text-sm mb-1">{{ $member->name }}</h3>
                    
                    <!-- Position -->
                    <p class="text-xs text-yellow-400 font-semibold">{{ $member->position }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Programs Section -->
@if($department->programs->count() > 0)
<section class="py-16 bg-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-white mb-4">Program Kerja</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-yellow-600 mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($department->programs as $program)
            <a href="{{ route('departments.program.show', [$department->slug, $program->id]) }}" class="group block">
                <div class="bg-gradient-to-br from-gray-900 to-black rounded-2xl overflow-hidden border-2 border-yellow-400/30 hover:border-gray-400 transition-all duration-300 hover:shadow-2xl hover:shadow-white/10 hover:-translate-y-2 h-full">
                    <div class="p-6">
                        <!-- Status Badge -->
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-4 py-1 rounded-full text-xs font-semibold border-2
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
                        <h3 class="text-xl font-bold text-yellow-400 mb-3 transition">
                            {{ $program->title }}
                        </h3>
                        
                        <!-- Description -->
                        <p class="text-gray-300 text-sm mb-4 leading-relaxed line-clamp-3">
                            {{ $program->description }}
                        </p>
                        
                        <!-- Date -->
                        @if($program->start_date)
                        <div class="flex items-center text-sm text-gray-400 border-t border-yellow-400/20 pt-4">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <span>{{ $program->start_date->format('d M Y') }}
                            @if($program->end_date) - {{ $program->end_date->format('d M Y') }} @endif
                            </span>
                        </div>
                        @endif
                    </div>
                    
                    <!-- View Detail Button -->
                    <div class="px-6 py-3 bg-yellow-400/10 border-t border-yellow-400/20 transition">
                        <span class="text-yellow-400 text-sm font-semibold flex items-center justify-between">
                            <span>Lihat Detail</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Social Media Section -->
@if($department->instagram || $department->twitter || $department->facebook || $department->youtube || $department->linkedin || $department->tiktok)
<section class="py-16 bg-gradient-to-br from-black via-gray-900 to-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-white mb-4">Ikuti Kami</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-yellow-600 mx-auto mb-4"></div>
            <p class="text-gray-400 text-lg">Temukan kami di media sosial</p>
        </div>
        
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4 justify-center">
            @if($department->instagram)
            <a href="{{ $department->instagram }}" target="_blank" rel="noopener noreferrer" 
               class="group bg-gradient-to-br from-gray-900 to-black rounded-xl p-4 border-2 border-yellow-400/30 hover:border-pink-400 transition-all duration-300 hover:shadow-lg hover:shadow-pink-400/20 hover:-translate-y-1 w-32">
                <div class="flex flex-col items-center">
                    <svg class="w-8 h-8 mb-2 text-yellow-400 group-hover:text-pink-400 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                    <span class="text-white text-xs font-semibold group-hover:text-pink-400 transition-colors">Instagram</span>
                </div>
            </a>
            @endif

            @if($department->twitter)
            <a href="{{ $department->twitter }}" target="_blank" rel="noopener noreferrer" 
               class="group bg-gradient-to-br from-gray-900 to-black rounded-xl p-4 border-2 border-yellow-400/30 hover:border-blue-400 transition-all duration-300 hover:shadow-lg hover:shadow-blue-400/20 hover:-translate-y-1 w-32">
                <div class="flex flex-col items-center">
                    <svg class="w-8 h-8 mb-2 text-yellow-400 group-hover:text-blue-400 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                    </svg>
                    <span class="text-white text-xs font-semibold group-hover:text-blue-400 transition-colors">Twitter/X</span>
                </div>
            </a>
            @endif

            @if($department->facebook)
            <a href="{{ $department->facebook }}" target="_blank" rel="noopener noreferrer" 
               class="group bg-gradient-to-br from-gray-900 to-black rounded-xl p-4 border-2 border-yellow-400/30 hover:border-blue-600 transition-all duration-300 hover:shadow-lg hover:shadow-blue-600/20 hover:-translate-y-1 w-32">
                <div class="flex flex-col items-center">
                    <svg class="w-8 h-8 mb-2 text-yellow-400 group-hover:text-blue-600 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                    <span class="text-white text-xs font-semibold group-hover:text-blue-600 transition-colors">Facebook</span>
                </div>
            </a>
            @endif

            @if($department->youtube)
            <a href="{{ $department->youtube }}" target="_blank" rel="noopener noreferrer" 
               class="group bg-gradient-to-br from-gray-900 to-black rounded-xl p-4 border-2 border-yellow-400/30 hover:border-red-600 transition-all duration-300 hover:shadow-lg hover:shadow-red-600/20 hover:-translate-y-1 w-32">
                <div class="flex flex-col items-center">
                    <svg class="w-8 h-8 mb-2 text-yellow-400 group-hover:text-red-600 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                    <span class="text-white text-xs font-semibold group-hover:text-red-600 transition-colors">YouTube</span>
                </div>
            </a>
            @endif

            @if($department->linkedin)
            <a href="{{ $department->linkedin }}" target="_blank" rel="noopener noreferrer" 
               class="group bg-gradient-to-br from-gray-900 to-black rounded-xl p-4 border-2 border-yellow-400/30 hover:border-blue-500 transition-all duration-300 hover:shadow-lg hover:shadow-blue-500/20 hover:-translate-y-1 w-32">
                <div class="flex flex-col items-center">
                    <svg class="w-8 h-8 mb-2 text-yellow-400 group-hover:text-blue-500 transition-colors" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>
                    <span class="text-white text-xs font-semibold group-hover:text-blue-500 transition-colors">LinkedIn</span>
                </div>
            </a>
            @endif

            @if($department->tiktok)
            <a href="{{ $department->tiktok }}" target="_blank" rel="noopener noreferrer" 
               class="group bg-gradient-to-br from-gray-900 to-black rounded-xl p-4 border-2 border-yellow-400/30 hover:border-white transition-all duration-300 hover:shadow-lg hover:shadow-white/20 hover:-translate-y-1 w-32">
                <div class="flex flex-col items-center">
                    <svg class="w-8 h-8 mb-2 text-yellow-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
                    </svg>
                    <span class="text-white text-xs font-semibold group-hover:text-white transition-colors">TikTok</span>
                </div>
            </a>
            @endif
        </div>
    </div>
</section>
@endif
@endsection
