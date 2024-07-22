<?php

namespace Database\Seeders\data;

use App\Models\kategoriPustaka;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        kategoriPustaka::insert([
            [
                'kode_kategori_pustaka' => 'KP-DEMO-001',
                'nama_kategori_pustaka' => 'Fiksi',
            ],

            [
                'kode_kategori_pustaka' => 'KP-DEMO-002',
                'nama_kategori_pustaka' => 'Filsafat',
            ],

            [
                'kode_kategori_pustaka' => 'KP-DEMO-003',
                'nama_kategori_pustaka' => 'Sejarah',
            ],

            [
                'kode_kategori_pustaka' => 'KP-DEMO-004',
                'nama_kategori_pustaka' => 'Agama',
            ],
        ]);
    }
}
