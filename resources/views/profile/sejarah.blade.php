@extends('layouts.app')

@section('title', 'Sejarah - HIMATEKKOM ITS')

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
                <li><span class="text-yellow-400">Sejarah</span></li>
            </ol>
        </nav>

        <div class="text-center">
            <div class="text-6xl mb-6">📜</div>
            <h1 class="text-5xl md:text-6xl font-extrabold mb-4 bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 bg-clip-text text-transparent">
                {{ $profile->title ?? 'Sejarah HIMATEKKOM ITS' }}
            </h1>
        </div>
    </div>

    <!-- Bottom Wave -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#000000"/>
        </svg>
    </div>
</section>

<!-- Content Section -->
<section class="py-16 bg-black">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-lg prose-invert max-w-none">
            @if($profile && $profile->content)
                {!! $profile->content !!}
            @else
                <p class="text-gray-300 leading-relaxed mb-6">
                    HIMATEKKOM (Himpunan Mahasiswa Teknik Komputer) ITS didirikan pada tahun 1985 sebagai wadah organisasi mahasiswa Departemen Teknik Komputer Institut Teknologi Sepuluh Nopember. Sejak awal berdirinya, HIMATEKKOM telah berkomitmen untuk mengembangkan potensi mahasiswa dalam bidang akademik, organisasi, dan sosial.
                </p>
                <p class="text-gray-300 leading-relaxed mb-6">
                    Seiring berjalannya waktu, HIMATEKKOM terus berkembang dan beradaptasi dengan perkembangan teknologi. Berbagai program kerja inovatif telah dilaksanakan untuk meningkatkan kualitas mahasiswa Teknik Komputer ITS.
                </p>
                <p class="text-gray-300 leading-relaxed">
                    Dengan semangat kolaborasi dan inovasi, HIMATEKKOM ITS terus bergerak maju menjadi organisasi yang solid, profesional, dan memberikan dampak positif bagi mahasiswa dan masyarakat.
                </p>
            @endif
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-gradient-to-r from-yellow-400 to-yellow-600">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold text-black mb-4">
            Pelajari Lebih Lanjut
        </h2>
        <p class="text-white text-lg mb-8 max-w-2xl mx-auto">
            Kenali lebih dalam tentang HIMATEKKOM ITS
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('profile.visi-misi') }}" class="inline-block bg-black text-yellow-400 px-8 py-4 rounded-lg font-bold hover:bg-gray-900 transition shadow-xl border-2 border-black">
                Visi & Misi
            </a>
            <a href="{{ route('profile.struktur') }}" class="inline-block bg-white text-black px-8 py-4 rounded-lg font-bold hover:bg-gray-100 transition shadow-xl border-2 border-white">
                Struktur Organisasi
            </a>
        </div>
    </div>
</section>
@endsection
