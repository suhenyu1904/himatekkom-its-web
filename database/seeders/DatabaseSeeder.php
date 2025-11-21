<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Department;
use App\Models\DepartmentProgram;
use App\Models\OrganizationStructure;
use App\Models\News;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\Profile;
use App\Models\Bso;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Run ContactInfoSeeder first
        $this->call([
            ContactInfoSeeder::class,
        ]);

        // Create Admin User
        $admin = User::create([
            'name' => 'Admin HIMATEKKOM',
            'email' => 'admin@himatekkom.its.ac.id',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role' => 'super_admin',
        ]);

        // Create Profiles
        Profile::create([
            'key' => 'sejarah',
            'title' => 'Sejarah HIMATEKKOM ITS',
            'content' => '<p>HIMATEKKOM (Himpunan Mahasiswa Teknik Komputer) ITS didirikan pada tahun 1985 sebagai wadah organisasi mahasiswa Departemen Teknik Komputer Institut Teknologi Sepuluh Nopember. Sejak awal berdirinya, HIMATEKKOM telah berkomitmen untuk mengembangkan potensi mahasiswa dalam bidang akademik, organisasi, dan sosial.</p>
            <p>Seiring berjalannya waktu, HIMATEKKOM terus berkembang dan beradaptasi dengan perkembangan teknologi. Berbagai program kerja inovatif telah dilaksanakan untuk meningkatkan kualitas mahasiswa Teknik Komputer ITS.</p>',
        ]);

        Profile::create([
            'key' => 'visi',
            'title' => 'Visi HIMATEKKOM ITS',
            'content' => '<p>Menjadi himpunan mahasiswa yang unggul, inovatif, dan berdaya saing dalam mengembangkan potensi mahasiswa Teknik Komputer ITS di bidang akademik, organisasi, dan sosial kemasyarakatan.</p>',
        ]);

        Profile::create([
            'key' => 'misi',
            'title' => 'Misi HIMATEKKOM ITS',
            'content' => '<ul>
                <li>Meningkatkan kualitas akademik mahasiswa Teknik Komputer ITS</li>
                <li>Mengembangkan soft skill dan hard skill mahasiswa melalui berbagai kegiatan</li>
                <li>Membangun networking dengan berbagai pihak untuk pengembangan mahasiswa</li>
                <li>Menjalankan program sosial kemasyarakatan yang bermanfaat</li>
                <li>Menciptakan lingkungan organisasi yang kondusif dan profesional</li>
            </ul>',
        ]);

        // Create Departments
        $departments = [
            [
                'name' => 'Kaderisasi',
                'slug' => 'kaderisasi',
                'description' => 'Departemen yang fokus pada pembinaan dan pengembangan karakter anggota HIMATEKKOM',
                'icon' => '🎓',
                'order' => 1,
            ],
            [
                'name' => 'Hublu',
                'slug' => 'hublu',
                'description' => 'Hubungan Luar - Menjalin kerjasama dan networking dengan berbagai pihak eksternal',
                'icon' => '🤝',
                'order' => 2,
            ],
            [
                'name' => 'Kesma',
                'slug' => 'kesma',
                'description' => 'Kesejahteraan Mahasiswa - Mengurus kesejahteraan dan kepentingan anggota HIMATEKKOM',
                'icon' => '❤️',
                'order' => 3,
            ],
            [
                'name' => 'Medfo',
                'slug' => 'medfo',
                'description' => 'Media dan Informasi - Mengelola publikasi dan dokumentasi kegiatan HIMATEKKOM',
                'icon' => '📱',
                'order' => 4,
            ],
            [
                'name' => 'KWU',
                'slug' => 'kwu',
                'description' => 'Kewirausahaan - Mengembangkan jiwa entrepreneurship dan kemandirian mahasiswa',
                'icon' => '💼',
                'order' => 5,
            ],
            [
                'name' => 'Dagri',
                'slug' => 'dagri',
                'description' => 'Dalam Negeri - Mengurus kegiatan internal dan administrasi HIMATEKKOM',
                'icon' => '🏛️',
                'order' => 6,
            ],
            [
                'name' => 'PSDM',
                'slug' => 'psdm',
                'description' => 'Pengembangan Sumber Daya Manusia - Fokus pada pengembangan kemampuan dan potensi anggota',
                'icon' => '👥',
                'order' => 7,
            ],
            [
                'name' => 'Risprof',
                'slug' => 'risprof',
                'description' => 'Riset dan Pengembangan Profesi - Mengembangkan riset dan profesionalisme mahasiswa',
                'icon' => '🔬',
                'order' => 8,
            ],
        ];

        foreach ($departments as $dept) {
            $department = Department::create($dept);

            // Create Programs for each department
            for ($i = 1; $i <= 3; $i++) {
                DepartmentProgram::create([
                    'department_id' => $department->id,
                    'title' => "Program Kerja {$department->name} #{$i}",
                    'description' => "Deskripsi program kerja {$department->name} yang ke-{$i}. Program ini bertujuan untuk meningkatkan kualitas dan kompetensi anggota di bidang {$department->name}.",
                    'start_date' => now()->addDays(rand(10, 60)),
                    'end_date' => now()->addDays(rand(70, 120)),
                    'status' => ['planned', 'ongoing', 'completed'][rand(0, 2)],
                ]);
            }
        }

        // Create Organization Structure
        $structures = [
            ['name' => 'Ahmad Rizki', 'position' => 'Ketua Himpunan', 'level' => 'ketua', 'order' => 1],
            ['name' => 'Siti Nurhaliza', 'position' => 'Wakil Ketua', 'level' => 'wakil', 'order' => 2],
            ['name' => 'Budi Santoso', 'position' => 'Sekretaris', 'level' => 'sekretaris', 'order' => 3],
            ['name' => 'Dewi Lestari', 'position' => 'Bendahara', 'level' => 'bendahara', 'order' => 4],
        ];

        foreach ($structures as $structure) {
            OrganizationStructure::create(array_merge($structure, [
                'email' => strtolower(str_replace(' ', '.', $structure['name'])) . '@himatekkom.its.ac.id',
                'bio' => 'Mahasiswa Teknik Komputer ITS yang aktif dalam organisasi',
            ]));
        }

        // Add coordinators for each department
        foreach (Department::all() as $dept) {
            OrganizationStructure::create([
                'name' => 'Koordinator ' . $dept->name,
                'position' => 'Koordinator',
                'level' => 'koordinator',
                'department_id' => $dept->id,
                'email' => 'koordinator.' . $dept->slug . '@himatekkom.its.ac.id',
                'order' => 10 + $dept->id,
            ]);
        }

        // Create News
        for ($i = 1; $i <= 6; $i++) {
            News::create([
                'title' => "Berita HIMATEKKOM ITS #{$i}",
                'excerpt' => 'Ringkasan berita terbaru dari kegiatan HIMATEKKOM ITS yang menarik dan informatif.',
                'content' => '<p>Konten lengkap berita ' . $i . ' tentang kegiatan HIMATEKKOM ITS. HIMATEKKOM ITS telah menyelenggarakan berbagai kegiatan yang bermanfaat bagi mahasiswa dan masyarakat.</p>
                <p>Kegiatan ini melibatkan berbagai departemen dan mendapat respon positif dari seluruh anggota. Kami berharap kegiatan seperti ini dapat terus dilaksanakan di masa mendatang.</p>',
                'author_id' => $admin->id,
                'category' => ['Akademik', 'Organisasi', 'Prestasi', 'Kegiatan'][rand(0, 3)],
                'is_published' => true,
                'published_at' => now()->subDays(rand(1, 30)),
                'views' => rand(50, 500),
            ]);
        }

        // Create Events
        $depts = Department::all();
        for ($i = 1; $i <= 5; $i++) {
            Event::create([
                'title' => "Event HIMATEKKOM #{$i}",
                'description' => 'Deskripsi singkat event yang akan dilaksanakan oleh HIMATEKKOM ITS.',
                'content' => '<p>Detail lengkap tentang event ' . $i . '. Event ini merupakan kegiatan tahunan HIMATEKKOM ITS yang bertujuan untuk mengembangkan kompetensi mahasiswa.</p>',
                'start_date' => now()->addDays(rand(5, 60)),
                'end_date' => now()->addDays(rand(61, 90)),
                'location' => 'Kampus ITS Sukolilo',
                'organizer' => 'HIMATEKKOM ITS',
                'department_id' => $depts->random()->id,
                'status' => 'upcoming',
                'is_published' => true,
            ]);
        }

        // Create Galleries
        for ($i = 1; $i <= 4; $i++) {
            $gallery = Gallery::create([
                'title' => "Galeri Kegiatan #{$i}",
                'description' => 'Dokumentasi kegiatan HIMATEKKOM ITS yang telah dilaksanakan.',
                'date' => now()->subDays(rand(10, 100)),
                'is_published' => true,
            ]);

            // Create images for gallery
            for ($j = 1; $j <= rand(3, 6); $j++) {
                GalleryImage::create([
                    'gallery_id' => $gallery->id,
                    'image' => 'https://via.placeholder.com/800x600.png?text=Gallery+' . $i . '+Photo+' . $j,
                    'caption' => 'Foto dokumentasi kegiatan ' . $gallery->title,
                    'order' => $j,
                ]);
            }
        }

        // Create BSO (Badan Semi Otonom)
        Bso::create([
            'name' => 'Centurion',
            'slug' => 'centurion',
            'type' => 'centurion',
            'description' => 'Badan Semi Otonom untuk supporter Teknik Komputer ITS ketika bertanding dalam berbagai kompetisi',
            'icon' => '🏆',
            'vision' => 'Menjadi supporter terbaik yang mendukung prestasi Teknik Komputer ITS',
            'mission' => 'Memberikan dukungan moral dan semangat kepada mahasiswa Teknik Komputer ITS dalam setiap pertandingan',
            'is_active' => true,
            'order' => 1,
        ]);

        Bso::create([
            'name' => 'Mage',
            'slug' => 'mage',
            'type' => 'mage',
            'description' => 'Media of Automation and Game Enthusiast - Lomba yang diadakan oleh Departemen Teknik Komputer ITS',
            'icon' => '🎮',
            'vision' => 'Menjadi kompetisi teknologi terkemuka di Indonesia',
            'mission' => 'Menyelenggarakan kompetisi yang menantang dan mengembangkan kemampuan mahasiswa di bidang automation dan gaming',
            'is_active' => true,
            'order' => 2,
        ]);
    }
}
