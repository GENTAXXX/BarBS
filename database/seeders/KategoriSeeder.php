<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori = [
            [
                'kategori' => 'Administrasi',
            ],
            [
                'kategori' => 'Advertising & Public Relations',
            ],
            [
                'kategori' => 'Agrikultur',
            ],
            [
                'kategori' => 'Akuntansi dan Keuangan',
            ],
            [
                'kategori' => 'Arts & Entertainment & Publishing',
            ],
            [
                'kategori' => 'Asuransi',
            ],
            [
                'kategori' => 'Customer Service',
            ],
            [
                'kategori' => 'Desain',
            ],
            [
                'kategori' => 'Event',
            ],
            [
                'kategori' => 'Hospitality & Travel',
            ],
            [
                'kategori' => 'Hukum & Keamanan',
            ],
            [
                'kategori' => 'Human Resources',
            ],
            [
                'kategori' => 'Informasi & Teknologi',
            ],
            [
                'kategori' => 'Internet & New Media',
            ],
            [
                'kategori' => 'Kecantikan',
            ],
            [
                'kategori' => 'Kesehatan dan Kedokteran',
            ],
            [
                'kategori' => 'Konstruksi dan Bangunan',
            ],
            [
                'kategori' => 'Management Consulting',
            ],
            [
                'kategori' => 'Non-Profit & Volunteer',
            ],
            [
                'kategori' => 'Otomotif',
            ],
            [
                'kategori' => 'Pabrik dan Manufaktur',
            ],
            [
                'kategori' => 'Pekerjaan Umum',
            ],
            [
                'kategori' => 'Pelayanan Profesional',
            ],
            [
                'kategori' => 'Pendidikan Dan Pelatihan',
            ],
            [
                'kategori' => 'Penjualan / Pemasaran',
            ],
            [
                'kategori' => 'Perbankan',
            ],
            [
                'kategori' => 'Programmer',
            ],
            [
                'kategori' => 'Property & Real Estate',
            ],
            [
                'kategori' => 'Research & Development',
            ],
            [
                'kategori' => 'Restaurant & Hotel',
            ],
            [
                'kategori' => 'Retail',
            ],
            [
                'kategori' => 'Teknik',
            ],
            [
                'kategori' => 'Telekomunikasi',
            ],
            [
                'kategori' => 'Transportasi & Logistik',
            ],
        ];

        DB::table('kategori')->insert($kategori);
    }
}

