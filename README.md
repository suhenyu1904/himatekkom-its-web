# Himatekkom Web

<div align="center">

[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![Filament](https://img.shields.io/badge/Filament-3.x-FDAE4B?style=for-the-badge&logo=data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTAgMEgxMDBWMTAwSDBWMFoiIGZpbGw9IiNGREFFNEIiLz48L3N2Zz4=&logoColor=white)](https://filamentphp.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![TailwindCSS](https://img.shields.io/badge/Tailwind-4.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white)](https://tailwindcss.com)
[![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)](LICENSE)

</div>

## 📋 Tentang Proyek

Website resmi **Himpunan Mahasiswa Teknik Komputer (Himatekkom)** yang dibangun menggunakan Laravel 12 dan Filament 3. Platform ini berfungsi sebagai pusat informasi dan komunikasi untuk mahasiswa, menampilkan profil organisasi, berita, event, galeri, dan informasi departemen serta BSO (Badan Semi Otonom).

### ✨ Fitur Utama

- 🏠 **Beranda** - Landing page dengan informasi terkini
- 👥 **Profil Organisasi** - Sejarah, Visi & Misi, Struktur Organisasi
- 🏛️ **Departemen** - Informasi departemen dan program kerja
- 📰 **Berita** - Artikel dan update terkini
- 📅 **Event** - Kalender dan detail acara
- 🖼️ **Galeri** - Dokumentasi foto kegiatan
- 🎯 **BSO** - Informasi Badan Semi Otonom
- 📧 **Kontak** - Form komunikasi dengan pengurus
- 🔐 **Admin Panel** - Dashboard manajemen konten dengan Filament

## 🚀 Tech Stack

### Backend
- **Laravel 12** - PHP Framework
- **Filament 3.2** - Admin Panel & Form Builder
- **MySQL/PostgreSQL** - Database
- **Laravel Tinker** - REPL Console

### Frontend
- **Vite 7** - Build Tool & Dev Server
- **TailwindCSS 4** - Utility-First CSS Framework
- **Alpine.js** - Lightweight JavaScript Framework (via Filament)
- **Livewire** - Dynamic UI Components

### Development Tools
- **Laravel Pint** - Code Styling
- **PHPUnit** - Testing Framework
- **Laravel Pail** - Log Viewer
- **Laravel Sail** - Docker Development Environment

## 📦 Persyaratan Sistem

- PHP >= 8.2
- Composer >= 2.0
- Node.js >= 18.x
- NPM >= 9.x
- Database (MySQL >= 8.0 / PostgreSQL >= 13)

## 🛠️ Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/your-username/himatekkom-web.git
cd himatekkom-web
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit file `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=himatekkom_web
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Database Migration & Seeding

```bash
php artisan migrate --seed
```

### 5. Storage Link

```bash
php artisan storage:link
```

### 6. Build Assets

```bash
npm run build
```

## 🏃‍♂️ Menjalankan Aplikasi

### Development Mode

Untuk menjalankan semua service secara bersamaan (server, queue, logs, vite):

```bash
composer dev
```

Atau jalankan secara terpisah:

```bash
# Terminal 1 - Laravel Development Server
php artisan serve

# Terminal 2 - Vite Dev Server (Hot Module Replacement)
npm run dev

# Terminal 3 - Queue Worker (optional)
php artisan queue:listen

# Terminal 4 - Log Viewer (optional)
php artisan pail
```

Aplikasi akan berjalan di `http://localhost:8000`

### Production Mode

```bash
# Build assets untuk production
npm run build

# Optimize Laravel
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Jalankan dengan web server (Nginx/Apache)
```

## 👨‍💼 Mengakses Admin Panel

Admin panel dapat diakses melalui `/admin`:

```
URL: http://localhost:8000/admin
```

Buat user admin pertama dengan:

```bash
php artisan make:filament-user
```

## 📚 Struktur Database

Aplikasi ini memiliki tabel utama:

- `users` - User & Administrator
- `departments` - Departemen organisasi
- `department_programs` - Program kerja departemen
- `organization_structures` - Struktur organisasi
- `news` - Artikel berita
- `events` - Event dan acara
- `galleries` - Album galeri
- `gallery_images` - Foto dalam galeri
- `contacts` - Pesan dari form kontak
- `contact_info` - Informasi kontak organisasi
- `profiles` - Profil organisasi
- `bsos` - Badan Semi Otonom

## 🧪 Testing

Jalankan test suite:

```bash
# Jalankan semua tests
composer test

# atau
php artisan test

# Test dengan coverage
php artisan test --coverage
```

## 📝 Code Styling

Proyek ini menggunakan Laravel Pint untuk code styling:

```bash
# Format semua file
./vendor/bin/pint

# Format file tertentu
./vendor/bin/pint app/Models

# Dry run (lihat perubahan tanpa apply)
./vendor/bin/pint --test
```

## 📖 Dokumentasi API Routes

### Public Routes

- `GET /` - Homepage
- `GET /profil/sejarah` - Sejarah organisasi
- `GET /profil/visi-misi` - Visi & Misi
- `GET /profil/struktur-organisasi` - Struktur organisasi
- `GET /departemen` - Daftar departemen
- `GET /departemen/{slug}` - Detail departemen
- `GET /departemen/{slug}/program/{id}` - Detail program
- `GET /berita` - Daftar berita
- `GET /berita/{slug}` - Detail berita
- `GET /event` - Daftar event
- `GET /event/{slug}` - Detail event
- `GET /galeri` - Daftar galeri
- `GET /galeri/{slug}` - Detail galeri
- `GET /bso/{slug}` - Detail BSO
- `GET /kontak` - Halaman kontak
- `POST /kontak` - Submit form kontak

### Admin Routes

- `/admin` - Filament Admin Panel (Protected)

## 🤝 Kontribusi

Kontribusi sangat diterima! Silakan ikuti langkah berikut:

1. Fork repository ini
2. Buat branch fitur (`git checkout -b feature/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Add some AmazingFeature'`)
4. Push ke branch (`git push origin feature/AmazingFeature`)
5. Buat Pull Request

Pastikan code Anda mengikuti style guide (jalankan `pint` sebelum commit).

## 📄 License



## 👥 Tim Pengembang

Dikembangkan oleh Susilo Hendri Yudhoyono

## 🔗 Link Terkait

- [Laravel Documentation](https://laravel.com/docs)
- [Filament Documentation](https://filamentphp.com/docs)
- [TailwindCSS Documentation](https://tailwindcss.com/docs)
- [Admin Guide](ADMIN_GUIDE.md)

---

<div align="center">

**Himatekkom Web** © 2024-2026

</div>
