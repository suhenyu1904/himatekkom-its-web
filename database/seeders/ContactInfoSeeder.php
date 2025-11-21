<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactInfo::create([
            'email' => 'himatekkom@its.ac.id',
            'phone' => '081234567890',
            'whatsapp' => '6281234567890',
            'address' => 'Departemen Teknik Komputer, Institut Teknologi Sepuluh Nopember, Kampus ITS Sukolilo, Surabaya, Jawa Timur, Indonesia 60111',
        ]);
    }
}
