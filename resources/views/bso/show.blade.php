@extends('layouts.app')

@section('title', $bso->name . ' - BSO HIMATEKKOM ITS')

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
                <li><span class="text-gray-400">BSO</span></li>
                <li><span class="text-gray-400">/</span></li>
                <li><span class="text-yellow-400">{{ $bso->name }}</span></li>
            </ol>
        </nav>

        <div class="text-center">
            <!-- Icon -->
            @if($bso->icon)
            <div class="text-8xl mb-6 animate-bounce">
                {{ $bso->icon }}
            </div>
            @endif

            <!-- Title -->
            <h1 class="text-5xl md:text-6xl font-extrabold mb-4 bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 bg-clip-text text-transparent">
                {{ $bso->name }}
            </h1>

            <!-- Type Badge -->
            <div class="inline-block mb-6">
                <span class="px-6 py-2 bg-yellow-400/20 text-yellow-400 rounded-full text-sm font-semibold border-2 border-yellow-400/50 uppercase tracking-wide">
                    {{ $bso->type }}
                </span>
            </div>

            <!-- Description -->
            <p class="text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed">
                {{ $bso->description }}
            </p>
        </div>
    </div>

    <!-- Bottom Wave -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white"/>
        </svg>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-black">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Vision -->
            @if($bso->vision)
            <div class="group">
                <div class="bg-gradient-to-br from-gray-900 to-black rounded-2xl p-8 h-full border-2 border-yellow-400/30 hover:border-gray-400 transition-all duration-300 hover:shadow-2xl hover:shadow-white/20 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div class="text-4xl mr-4">🎯</div>
                        <h2 class="text-3xl font-bold text-yellow-400">VISI</h2>
                    </div>
                    <div class="h-1 w-20 bg-gradient-to-r from-yellow-400 to-transparent mb-6"></div>
                    <p class="text-gray-300 leading-relaxed text-lg">
                        {{ $bso->vision }}
                    </p>
                </div>
            </div>
            @endif

            <!-- Mission -->
            @if($bso->mission)
            <div class="group">
                <div class="bg-gradient-to-br from-gray-900 to-black rounded-2xl p-8 h-full border-2 border-yellow-400/30 hover:border-gray-400 transition-all duration-300 hover:shadow-2xl hover:shadow-white/20 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div class="text-4xl mr-4">🚀</div>
                        <h2 class="text-3xl font-bold text-yellow-400">MISI</h2>
                    </div>
                    <div class="h-1 w-20 bg-gradient-to-r from-yellow-400 to-transparent mb-6"></div>
                    <p class="text-gray-300 leading-relaxed text-lg">
                        {{ $bso->mission }}
                    </p>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>

<!-- Contact Section -->
@if($bso->contact_email || $bso->contact_phone || $bso->instagram)
<section class="py-16 bg-gradient-to-br from-gray-900 to-black">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-yellow-400 mb-4">HUBUNGI KAMI</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-yellow-400 to-yellow-600 mx-auto"></div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Email -->
            @if($bso->contact_email)
            <a href="mailto:{{ $bso->contact_email }}" class="group">
                <div class="bg-gradient-to-br from-black to-gray-900 rounded-xl p-8 text-center border-2 border-yellow-400/30 hover:border-gray-400 transition-all duration-300 hover:shadow-xl hover:shadow-white/20 hover:-translate-y-2">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">📧</div>
                    <h3 class="text-yellow-400 font-semibold mb-2 text-lg">EMAIL</h3>
                    <p class="text-gray-300 text-sm break-all">{{ $bso->contact_email }}</p>
                </div>
            </a>
            @endif

            <!-- Phone -->
            @if($bso->contact_phone)
            <a href="tel:{{ $bso->contact_phone }}" class="group">
                <div class="bg-gradient-to-br from-black to-gray-900 rounded-xl p-8 text-center border-2 border-yellow-400/30 hover:border-gray-400 transition-all duration-300 hover:shadow-xl hover:shadow-white/20 hover:-translate-y-2">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">📱</div>
                    <h3 class="text-yellow-400 font-semibold mb-2 text-lg">TELEPON</h3>
                    <p class="text-gray-300 text-sm">{{ $bso->contact_phone }}</p>
                </div>
            </a>
            @endif

            <!-- Instagram -->
            @if($bso->instagram)
            <a href="https://instagram.com/{{ $bso->instagram }}" target="_blank" class="group">
                <div class="bg-gradient-to-br from-black to-gray-900 rounded-xl p-8 text-center border-2 border-yellow-400/30 hover:border-gray-400 transition-all duration-300 hover:shadow-xl hover:shadow-white/20 hover:-translate-y-2">
                    <div class="text-5xl mb-4 group-hover:scale-110 transition-transform">📷</div>
                    <h3 class="text-yellow-400 font-semibold mb-2 text-lg">INSTAGRAM</h3>
                    <p class="text-gray-300 text-sm">@{{ $bso->instagram }}</p>
                </div>
            </a>
            @endif
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-yellow-400 to-yellow-600">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-black mb-4">
            Tertarik Bergabung?
        </h2>
        <p class="text-white text-lg mb-8 max-w-2xl mx-auto">
            Ikuti informasi terbaru dan jadilah bagian dari {{ $bso->name }} HIMATEKKOM ITS
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            @if($bso->instagram)
            <a href="https://instagram.com/{{ $bso->instagram }}" target="_blank" class="inline-block bg-black text-yellow-400 px-8 py-4 rounded-lg font-bold hover:bg-gray-900 transition shadow-xl border-2 border-black">
                Follow Instagram Kami
            </a>
            @endif
            <a href="{{ route('contact.index') }}" class="inline-block bg-white text-black px-8 py-4 rounded-lg font-bold hover:bg-gray-100 transition shadow-xl border-2 border-white">
                Hubungi HIMATEKKOM
            </a>
        </div>
    </div>
</section>
@endsection
