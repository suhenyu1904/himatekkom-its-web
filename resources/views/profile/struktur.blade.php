@extends('layouts.app')

@section('title', 'Struktur Organisasi - HIMATEKKOM ITS')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-black via-gray-900 to-black text-white overflow-hidden py-20">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-400 via-transparent to-yellow-400 animate-pulse"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <!-- Breadcrumb -->
        <nav class="mb-8">
            <ol class="flex items-center space-x-2 text-sm">
                <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition">Beranda</a></li>
                <li><span class="text-gray-400">/</span></li>
                <li><span class="text-gray-400">Profil</span></li>
                <li><span class="text-gray-400">/</span></li>
                <li><span class="text-yellow-400">Struktur Organisasi</span></li>
            </ol>
        </nav>

        <div class="text-center">
            <div class="text-6xl mb-6">👥</div>
            <h1 class="text-5xl md:text-6xl font-extrabold mb-4 bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 bg-clip-text text-transparent">
                STRUKTUR ORGANISASI
            </h1>
            <p class="text-xl text-gray-300">Pengurus HIMATEKKOM ITS Periode 2024/2025</p>
        </div>
    </div>

    <!-- Bottom Wave -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
        </svg>
    </div>
</section>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    @if(isset($structures['ketua']))
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-white mb-6 text-center">Pimpinan Himpunan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                @foreach($structures['ketua'] as $member)
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-4"></div>
                    <h3 class="text-xl font-bold text-white">{{ $member->name }}</h3>
                    <p class="text-yellow-400 font-semibold">{{ $member->position }}</p>
                    @if($member->email)
                    <p class="text-sm text-gray-400 mt-2">{{ $member->email }}</p>
                    @endif
                </div>
                @endforeach
                
                @if(isset($structures['wakil']))
                    @foreach($structures['wakil'] as $member)
                    <div class="bg-white rounded-lg shadow-md p-6 text-center">
                        <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-4"></div>
                        <h3 class="text-xl font-bold text-white">{{ $member->name }}</h3>
                        <p class="text-yellow-400 font-semibold">{{ $member->position }}</p>
                        @if($member->email)
                        <p class="text-sm text-gray-400 mt-2">{{ $member->email }}</p>
                        @endif
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif

    @if(isset($structures['sekretaris']) || isset($structures['bendahara']))
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-white mb-6 text-center">Sekretaris & Bendahara</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                @if(isset($structures['sekretaris']))
                    @foreach($structures['sekretaris'] as $member)
                    <div class="bg-white rounded-lg shadow-md p-6 text-center">
                        <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-4"></div>
                        <h3 class="text-xl font-bold text-white">{{ $member->name }}</h3>
                        <p class="text-yellow-400 font-semibold">{{ $member->position }}</p>
                        @if($member->email)
                        <p class="text-sm text-gray-400 mt-2">{{ $member->email }}</p>
                        @endif
                    </div>
                    @endforeach
                @endif
                
                @if(isset($structures['bendahara']))
                    @foreach($structures['bendahara'] as $member)
                    <div class="bg-white rounded-lg shadow-md p-6 text-center">
                        <div class="w-32 h-32 bg-gray-300 rounded-full mx-auto mb-4"></div>
                        <h3 class="text-xl font-bold text-white">{{ $member->name }}</h3>
                        <p class="text-yellow-400 font-semibold">{{ $member->position }}</p>
                        @if($member->email)
                        <p class="text-sm text-gray-400 mt-2">{{ $member->email }}</p>
                        @endif
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    @endif

    @if(isset($structures['koordinator']))
        <div>
            <h2 class="text-2xl font-bold text-white mb-6 text-center">Koordinator Departemen</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
                @foreach($structures['koordinator'] as $member)
                <div class="bg-white rounded-lg shadow-md p-6 text-center">
                    <div class="w-24 h-24 bg-gray-300 rounded-full mx-auto mb-4"></div>
                    <h3 class="font-bold text-white">{{ $member->name }}</h3>
                    <p class="text-sm text-yellow-400 font-semibold">{{ $member->position }}</p>
                    @if($member->department)
                    <p class="text-xs text-gray-400 mt-1">{{ $member->department->name }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
