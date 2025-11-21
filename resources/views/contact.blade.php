@extends('layouts.app')

@section('title', 'Kontak - HIMATEKKOM ITS')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-black via-gray-900 to-black text-white overflow-hidden py-20">
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0 bg-gradient-to-br from-yellow-400 via-transparent to-yellow-400 animate-pulse"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative text-center">
        <div class="text-6xl mb-6">📧</div>
        <h1 class="text-5xl md:text-6xl font-extrabold mb-4 bg-gradient-to-r from-yellow-400 via-yellow-300 to-yellow-400 bg-clip-text text-transparent">
            HUBUNGI KAMI
        </h1>
        <p class="text-xl text-gray-300">Ada pertanyaan? Kami siap membantu Anda</p>
    </div>

    <!-- Bottom Wave -->
    <div class="absolute bottom-0 left-0 right-0">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#000000"/>
        </svg>
    </div>
</section>

<section class="py-16 bg-black">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-yellow-400 mb-4">Informasi Kontak</h2>
            <p class="text-gray-300 text-lg">Hubungi kami untuk informasi lebih lanjut tentang HIMATEKKOM ITS</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Alamat -->
            <div class="bg-gradient-to-br from-gray-900 to-black rounded-xl border-2 border-yellow-400/30 p-6 hover:border-yellow-400/50 transition">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-yellow-400/10 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-white mb-3 text-xl">Alamat</h3>
                    <p class="text-gray-300 leading-relaxed">{{ $contactInfo ? $contactInfo->address : 'Departemen Teknik Komputer, Institut Teknologi Sepuluh Nopember, Kampus ITS Sukolilo, Surabaya, Jawa Timur, Indonesia' }}</p>
                </div>
            </div>

            <!-- Email -->
            <div class="bg-gradient-to-br from-gray-900 to-black rounded-xl border-2 border-yellow-400/30 p-6 hover:border-yellow-400/50 transition">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-yellow-400/10 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-white mb-3 text-xl">Email</h3>
                    <a href="mailto:{{ $contactInfo ? $contactInfo->email : 'info@himatekkom.its.ac.id' }}" class="text-gray-300 hover:text-yellow-400 transition text-lg break-all">{{ $contactInfo ? $contactInfo->email : 'info@himatekkom.its.ac.id' }}</a>
                </div>
            </div>

            <!-- Telepon -->
            <div class="bg-gradient-to-br from-gray-900 to-black rounded-xl border-2 border-yellow-400/30 p-6 hover:border-yellow-400/50 transition">
                <div class="flex flex-col items-center text-center">
                    <div class="w-16 h-16 bg-yellow-400/10 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                    <h3 class="font-bold text-white mb-3 text-xl">Telepon</h3>
                    <a href="tel:{{ $contactInfo ? $contactInfo->phone : '+62311234567' }}" class="text-gray-300 hover:text-yellow-400 transition text-lg">{{ $contactInfo ? $contactInfo->phone : '(031) 1234-5678' }}</a>
                </div>
            </div>
        </div>

        @if($contactInfo && $contactInfo->whatsapp)
        <div class="max-w-2xl mx-auto mb-8">
            <a href="https://wa.me/{{ $contactInfo->whatsapp }}" target="_blank" class="flex items-center justify-center w-full bg-green-500 text-white px-8 py-5 rounded-xl font-bold hover:bg-green-600 transition shadow-2xl text-lg group">
                <svg class="w-7 h-7 mr-3 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                </svg>
                <span>Hubungi via WhatsApp</span>
            </a>
        </div>
        @endif

        <div class="max-w-2xl mx-auto">
            <div class="bg-gradient-to-br from-gray-900 to-black rounded-xl border-2 border-yellow-400/30 p-8">
                <h3 class="font-bold text-white mb-6 text-2xl text-center">Ikuti Kami</h3>
                <div class="flex justify-center items-center gap-4">
                    <a href="#" class="group">
                        <div class="w-12 h-12 flex items-center justify-center bg-transparent border-2 border-gray-600 hover:border-gray-400 rounded-lg text-gray-400 hover:text-white transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </div>
                    </a>
                    <a href="#" class="group">
                        <div class="w-12 h-12 flex items-center justify-center bg-transparent border-2 border-gray-600 hover:border-gray-400 rounded-lg text-gray-400 hover:text-white transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </div>
                    </a>
                    <a href="#" class="group">
                        <div class="w-12 h-12 flex items-center justify-center bg-transparent border-2 border-gray-600 hover:border-gray-400 rounded-lg text-gray-400 hover:text-white transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                        </div>
                    </a>
                    <a href="#" class="group">
                        <div class="w-12 h-12 flex items-center justify-center bg-transparent border-2 border-gray-600 hover:border-gray-400 rounded-lg text-gray-400 hover:text-white transition">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
