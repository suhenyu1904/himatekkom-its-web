<nav class="bg-gradient-to-r from-gray-900 via-black to-gray-900 shadow-2xl sticky top-0 z-50 border-b-2 border-yellow-400">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo with Animation -->
                <div class="flex-shrink-0 flex items-center group">
                    <a href="{{ route('home') }}" class="flex items-center space-x-2">
                        <div class="bg-yellow-400/20 backdrop-blur-sm p-2 rounded-lg group-hover:scale-105 group-hover:bg-yellow-400/30 transition-all duration-300 border border-yellow-400/30">
                            <img src="{{ asset('storage/images/logo/biglogo.svg') }}" alt="Logo HIMATEKKOM" class="w-6 h-6">
                        </div>
                        <div>
                            <span class="text-xl font-bold text-yellow-400">HIMATEKKOM</span>
                            <span class="text-xl font-bold text-white ml-1">ITS</span>
                        </div>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:ml-10 md:flex md:items-center md:space-x-1">
                    <!-- Home -->
                    <a href="{{ route('home') }}" class="inline-flex items-center px-4 py-2 text-sm font-semibold {{ request()->routeIs('home') ? 'text-black border-b-2 border-yellow-400 bg-yellow-400' : 'text-gray-300 hover:text-white' }} transition-all duration-200 h-10 rounded-t-lg">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Beranda
                    </a>
                    
                    <!-- Profil Dropdown -->
                    <div class="relative group flex items-center">
                        <button class="inline-flex items-center px-4 py-2 text-sm font-semibold {{ request()->routeIs('profile.*') ? 'text-black border-b-2 border-yellow-400 bg-yellow-400' : 'text-gray-300 hover:text-white' }} transition-all duration-200 h-10 rounded-t-lg">
                            Profil
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute left-0 top-full mt-0 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                            <div class="bg-gradient-to-b from-gray-900 to-black shadow-2xl rounded-lg border-2 border-yellow-400/30 overflow-hidden mt-1">
                                <a href="{{ route('profile.sejarah') }}" class="block px-4 py-3 text-sm text-gray-300 hover:bg-gray-800/30 hover:text-white transition-colors border-b border-yellow-400/10">Sejarah</a>
                                <a href="{{ route('profile.visi-misi') }}" class="block px-4 py-3 text-sm text-gray-300 hover:bg-gray-800/30 hover:text-white transition-colors border-b border-yellow-400/10">Visi & Misi</a>
                                <a href="{{ route('profile.struktur') }}" class="block px-4 py-3 text-sm text-gray-300 hover:bg-gray-800/30 hover:text-white transition-colors">Struktur Organisasi</a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Departemen Dropdown -->
                    <div class="relative group flex items-center">
                        <button class="inline-flex items-center px-4 py-2 text-sm font-semibold {{ request()->routeIs('departments.*') ? 'text-black border-b-2 border-yellow-400 bg-yellow-400' : 'text-gray-300 hover:text-white' }} transition-all duration-200 h-10 rounded-t-lg">
                            Departemen
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute left-0 top-full mt-0 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                            <div class="bg-gradient-to-b from-gray-900 to-black shadow-2xl rounded-lg border-2 border-yellow-400/30 overflow-hidden mt-1">
                                @php
                                    $departments = \App\Models\Department::where('is_active', true)->orderBy('order')->get();
                                @endphp
                                @foreach($departments as $dept)
                                <a href="{{ route('departments.show', $dept->slug) }}" class="block px-4 py-3 text-sm text-gray-300 hover:bg-gray-800/30 hover:text-white transition-colors {{ !$loop->last ? 'border-b border-yellow-400/10' : '' }}">
                                    {{ $dept->name }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <!-- BSO Dropdown -->
                    <div class="relative group flex items-center">
                        <button class="inline-flex items-center px-4 py-2 text-sm font-semibold {{ request()->routeIs('bso.*') ? 'text-black border-b-2 border-yellow-400 bg-yellow-400' : 'text-gray-300 hover:text-white' }} transition-all duration-200 h-10 rounded-t-lg">
                            BSO
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute left-0 top-full mt-0 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0 z-50">
                            <div class="bg-gradient-to-b from-gray-900 to-black shadow-2xl rounded-lg border-2 border-yellow-400/30 overflow-hidden mt-1">
                                @php
                                    $bsos = \App\Models\Bso::where('is_active', true)->orderBy('order')->get();
                                @endphp
                                @foreach($bsos as $bso)
                                <a href="{{ route('bso.show', $bso->slug) }}" class="block px-4 py-3 text-sm text-gray-300 hover:bg-gray-800/30 hover:text-white transition-colors {{ !$loop->last ? 'border-b border-yellow-400/10' : '' }}">
                                    {{ $bso->name }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <!-- Other Menu Items with Icons -->
                    <a href="{{ route('news.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-semibold {{ request()->routeIs('news.*') ? 'text-black border-b-2 border-yellow-400 bg-yellow-400' : 'text-gray-300 hover:text-white' }} transition-all duration-200 h-10 rounded-t-lg">
                        Berita
                    </a>
                    
                    <a href="{{ route('events.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-semibold {{ request()->routeIs('events.*') ? 'text-black border-b-2 border-yellow-400 bg-yellow-400' : 'text-gray-300 hover:text-white' }} transition-all duration-200 h-10 rounded-t-lg">
                        Event
                    </a>
                    
                    <a href="{{ route('gallery.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-semibold {{ request()->routeIs('gallery.*') ? 'text-black border-b-2 border-yellow-400 bg-yellow-400' : 'text-gray-300 hover:text-white' }} transition-all duration-200 h-10 rounded-t-lg">
                        Galeri
                    </a>
                    
                    <a href="{{ route('contact.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-semibold {{ request()->routeIs('contact.*') ? 'text-black border-b-2 border-yellow-400 bg-yellow-400' : 'text-gray-300 hover:text-white' }} transition-all duration-200 h-10 rounded-t-lg">
                        Kontak
                    </a>
                </div>
            </div>
            
            <!-- Mobile menu button with Animation -->
            <div class="flex items-center md:hidden">
                <button id="mobile-menu-button" type="button" class="inline-flex items-center justify-center p-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 transition-all duration-200">
                    <svg id="menu-icon" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="close-icon" class="h-6 w-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-yellow-400/30 bg-gradient-to-b from-gray-900 to-black">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <a href="{{ route('home') }}" class="flex items-center px-3 py-2 rounded-lg text-base font-medium {{ request()->routeIs('home') ? 'bg-yellow-400 text-black' : 'text-gray-300 hover:bg-gray-800/30 hover:text-white' }} transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Beranda
            </a>
            
            <!-- Profil Mobile -->
            <div>
                <button id="mobile-profil-button" class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-base font-medium text-gray-300 hover:bg-gray-800/30 hover:text-white transition-all duration-200">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Profil
                    </div>
                    <svg id="profil-chevron" class="h-5 w-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="mobile-profil-menu" class="hidden pl-11 space-y-1 mt-1">
                    <a href="{{ route('profile.sejarah') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-800/30 hover:text-white transition">Sejarah</a>
                    <a href="{{ route('profile.visi-misi') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-800/30 hover:text-white transition">Visi & Misi</a>
                    <a href="{{ route('profile.struktur') }}" class="block px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-800/30 hover:text-white transition">Struktur Organisasi</a>
                </div>
            </div>
            
            <!-- Departemen Mobile -->
            <div>
                <button id="mobile-dept-button" class="w-full flex items-center justify-between px-3 py-2 rounded-lg text-base font-medium text-gray-300 hover:bg-gray-800/30 hover:text-white transition-all duration-200">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        Departemen
                    </div>
                    <svg id="dept-chevron" class="h-5 w-5 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div id="mobile-dept-menu" class="hidden pl-11 space-y-1 mt-1">
                    @php
                        $mobileDepartments = \App\Models\Department::where('is_active', true)->orderBy('order')->get();
                    @endphp
                    @foreach($mobileDepartments as $dept)
                    <a href="{{ route('departments.show', $dept->slug) }}" class="flex items-center px-3 py-2 rounded-lg text-sm text-gray-300 hover:bg-gray-800/30 hover:text-white transition">
                        @if($dept->icon)<span class="mr-2">{{ $dept->icon }}</span>@endif {{ $dept->name }}
                    </a>
                    @endforeach
                </div>
            </div>
            
            <a href="{{ route('news.index') }}" class="flex items-center px-3 py-2 rounded-lg text-base font-medium {{ request()->routeIs('news.*') ? 'bg-yellow-400 text-black' : 'text-gray-300 hover:bg-gray-800/30 hover:text-white' }} transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                Berita
            </a>
            
            <a href="{{ route('events.index') }}" class="flex items-center px-3 py-2 rounded-lg text-base font-medium {{ request()->routeIs('events.*') ? 'bg-yellow-400 text-black' : 'text-gray-300 hover:bg-gray-800/30 hover:text-white' }} transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Event
            </a>
            
            <a href="{{ route('gallery.index') }}" class="flex items-center px-3 py-2 rounded-lg text-base font-medium {{ request()->routeIs('gallery.*') ? 'bg-yellow-400 text-black' : 'text-gray-300 hover:bg-gray-800/30 hover:text-white' }} transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                Galeri
            </a>
            
            <a href="{{ route('contact.index') }}" class="flex items-center px-3 py-2 rounded-lg text-base font-medium {{ request()->routeIs('contact.*') ? 'bg-yellow-400 text-black' : 'text-gray-300 hover:bg-gray-800/30 hover:text-white' }} transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Kontak
            </a>
        </div>
    </div>
</nav>

@push('scripts')
<script>
    // Mobile menu toggle with animation
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');
    
    mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
    
    // Mobile profil dropdown with smooth animation
    const profilButton = document.getElementById('mobile-profil-button');
    const profilMenu = document.getElementById('mobile-profil-menu');
    const profilChevron = document.getElementById('profil-chevron');
    
    profilButton.addEventListener('click', function() {
        profilMenu.classList.toggle('hidden');
        profilChevron.classList.toggle('rotate-180');
    });
    
    // Mobile department dropdown with smooth animation
    const deptButton = document.getElementById('mobile-dept-button');
    const deptMenu = document.getElementById('mobile-dept-menu');
    const deptChevron = document.getElementById('dept-chevron');
    
    deptButton.addEventListener('click', function() {
        deptMenu.classList.toggle('hidden');
        deptChevron.classList.toggle('rotate-180');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const navbar = document.querySelector('nav');
        if (!navbar.contains(event.target) && !mobileMenu.classList.contains('hidden')) {
            mobileMenu.classList.add('hidden');
            menuIcon.classList.remove('hidden');
            closeIcon.classList.add('hidden');
        }
    });

    // Add scroll effect to navbar
    let lastScroll = 0;
    const navbar = document.querySelector('nav');
    
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll <= 0) {
            navbar.classList.remove('shadow-md');
        } else {
            navbar.classList.add('shadow-md');
        }
        
        lastScroll = currentScroll;
    });
</script>
@endpush
