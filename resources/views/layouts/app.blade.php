<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HIMATEKKOM ITS - Himpunan Mahasiswa Teknik Komputer')</title>
    <meta name="description" content="@yield('description', 'Website Resmi HIMATEKKOM ITS - Himpunan Mahasiswa Teknik Komputer Institut Teknologi Sepuluh Nopember')">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @stack('styles')
</head>
<body class="bg-black">
    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    @stack('scripts')
</body>
</html>
