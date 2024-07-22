<?php

namespace Database\Seeders\data;

use App\Models\Pustaka;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class bukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pustaka::insert([
            [
                'kode_pustaka' => 'KP-DEMO-001',
                'judul_pustaka' => 'Belajar Laravel 8',
                'kategori_pustaka_id' => 1,
                'penerbit_id' => 1,
                'penulis_id' => 1,
                'tahun' => 2024,
                'gambar_pustaka' => '1721619121.jpg',
                'halaman' => 100,
                'stok' => 10,
                'rak' => 'D1',
            ],

            [
                'kode_pustaka' => 'KP-DEMO-002',
                'judul_pustaka' => 'Belajar Vue.js 3',
                'kategori_pustaka_id' => 2,
                'penerbit_id' => 2,
                'penulis_id' => 2,
                'tahun' => 2024,
                'gambar_pustaka' => '1721619121.jpg',
                'halaman' => 100,
                'stok' => 10,
                'rak' => 'D1',
            ],

            [
                'kode_pustaka' => 'KP-DEMO-003',
                'judul_pustaka' => 'Belajar React.js 17',
                'kategori_pustaka_id' => 3,
                'penerbit_id' => 3,
                'penulis_id' => 3,
                'tahun' => 2024,
                'gambar_pustaka' => '1721619121.jpg',
                'halaman' => 100,
                'stok' => 10,
                'rak' => 'D1',
            ],

            [
                'kode_pustaka' => 'KP-DEMO-004',
                'judul_pustaka' => 'Belajar PHP 8',
                'kategori_pustaka_id' => 4,
                'penerbit_id' => 4,
                'penulis_id' => 4,
                'tahun' => 2024,
                'gambar_pustaka' => '1721619121.jpg',
                'halaman' => 100,
                'stok' => 10,
                'rak' => 'D1',
            ],

            [
                'kode_pustaka' => 'KP-DEMO-005',
                'judul_pustaka' => 'Belajar Python 3',
                'kategori_pustaka_id' => 1,
                'penerbit_id' => 1,
                'penulis_id' => 1,
                'tahun' => 2024,
                'gambar_pustaka' => '1721619121.jpg',
                'halaman' => 100,
                'stok' => 10,
                'rak' => 'D1',
            ],
        ]);
    }
}
