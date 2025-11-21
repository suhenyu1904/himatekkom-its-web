# HIMATEKKOM ITS - Admin Panel Documentation

## Login Credentials

### Super Admin (Full Access)
- **Email**: admin@himatekkom.its.ac.id
- **Password**: password

**Catatan**: Hanya ada 1 super admin dengan full access ke semua fitur.

## Akses Admin Panel

URL: http://localhost:8000/admin (atau domain Anda)

## Fitur yang Tersedia

### Navigation Structure (Sidebar Menu)

#### 🏠 Dashboard
Halaman utama dengan overview statistik

#### 📊 Master Data
- **Semua Departemen**: Kelola informasi 8 departemen
- **Semua Program Kerja**: Kelola semua program kerja (view global)

#### 📰 Publikasi
- **Berita**: Publikasi berita dan kegiatan HIMATEKKOM
- **Event**: Kelola event dan kegiatan yang akan datang  
- **Galeri**: Upload dan kelola album foto kegiatan

#### 🏢 Organisasi
- **Profil**: Kelola Sejarah, Visi Misi, dan Struktur Organisasi HIMATEKKOM
- **Struktur Organisasi**: Kelola data pengurus HIMATEKKOM
- **BSO**: Kelola informasi BSO (Centurion dan Mage)

#### 📁 Per Departemen (8 Groups)
Setiap departemen memiliki group sendiri dengan submenu:
- **Kaderisasi** → Program Kerja (filtered)
- **Hublu** → Program Kerja (filtered)
- **Kesma** → Program Kerja (filtered)
- **Medfo** → Program Kerja (filtered)
- **KWU** → Program Kerja (filtered)
- **Dagri** → Program Kerja (filtered)
- **PSDM** → Program Kerja (filtered)
- **Risprof** → Program Kerja (filtered)

*Klik menu departemen akan menampilkan program kerja yang di-filter khusus untuk departemen tersebut, lengkap dengan badge jumlah program.*

#### ⚙️ Pengaturan
- **Users**: Kelola user admin (hanya Super Admin)

## Role & Permission

### Super Admin
- Full access ke semua menu dan fitur
- Bisa manage semua departemen dan program kerja
- Bisa create/edit/delete users
- Akses ke semua group navigation

## Tips Penggunaan

1. **Upload Gambar**: Semua gambar otomatis disimpan di folder `storage/app/public/`
2. **Rich Editor**: Gunakan Rich Editor untuk konten yang lebih menarik (mendukung formatting, list, dll)
3. **Slug**: Slug otomatis dibuat dari judul, tapi bisa diedit manual jika perlu
4. **Status Publikasi**: Toggle "Publikasikan" untuk mengatur apakah konten ditampilkan di website publik
5. **Navigation Departemen**: Klik nama departemen di sidebar untuk langsung melihat program kerja departemen tersebut
6. **Badge Counter**: Badge di menu departemen menunjukkan jumlah program kerja aktif
7. **Filter Otomatis**: Ketika akses dari menu departemen, filter otomatis diterapkan

## Struktur Data

### Departemen
- 8 Departemen: Kaderisasi, Hublu, Kesma, Medfo, KWU, Dagri, PSDM, Risprof
- Setiap departemen memiliki group navigation sendiri
- Badge counter menampilkan jumlah program kerja

### Program Kerja
- Linked to specific department
- Status: Direncanakan, Sedang Berjalan, Selesai
- Bisa diakses dari "Semua Program Kerja" atau dari menu departemen spesifik
- Filter otomatis ketika diakses dari menu departemen

### Konten Dinamis
Semua konten website (berita, event, galeri, profil) dapat dikelola melalui admin panel.

## Admin Panel Organization

### Sidebar Navigation:
```
🏠 Dashboard
📊 Master Data
   ├─ Semua Departemen
   └─ Semua Program Kerja
📰 Publikasi
   ├─ Berita
   ├─ Event
   └─ Galeri
🏢 Organisasi
   ├─ Profil
   ├─ Struktur Organisasi
   └─ BSO
📁 Kaderisasi
   └─ Program Kerja (3)
📁 Hublu
   └─ Program Kerja (3)
📁 Kesma
   └─ Program Kerja (3)
📁 Medfo
   └─ Program Kerja (3)
📁 KWU
   └─ Program Kerja (3)
📁 Dagri
   └─ Program Kerja (3)
📁 PSDM
   └─ Program Kerja (3)
📁 Risprof
   └─ Program Kerja (3)
⚙️ Pengaturan
   └─ Users
```

## Custom Login Page

Login page sudah dikustomisasi dengan:
- Logo HIMATEKKOM ITS
- Tema gelap dengan accent yellow
- Border kuning pada form

## Technical Notes

- Framework: Laravel 12 + Filament 3
- Frontend: TailwindCSS 4.0
- Database: MySQL
- Color Scheme: Black (#000000) + Yellow (#FBBF24)

## Troubleshooting

**Q: Tidak bisa login?**
A: Gunakan email: admin@himatekkom.its.ac.id dan password: password

**Q: Gambar tidak muncul?**
A: Jalankan `php artisan storage:link` untuk link storage folder

**Q: Menu departemen tidak muncul?**
A: Clear cache dengan `php artisan optimize:clear`

**Q: Badge counter tidak update?**
A: Refresh halaman atau clear browser cache

## Development Commands

```bash
# Migrate fresh dengan seeder
php artisan migrate:fresh --seed

# Link storage
php artisan storage:link

# Build frontend assets
npm run build

# Run development server
php artisan serve
```

---

**Support**: admin@himatekkom.its.ac.id
