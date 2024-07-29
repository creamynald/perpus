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
                'kode_pustaka' => 'TP-001',
                'judul_pustaka' => 'Tema 1 Diriku',
                'kategori_pustaka_id' => 1,
                'penerbit_id' => 1,
                'penulis_id' => 1,
                'tahun' => 2017,
                'gambar_pustaka' => '1721619121.jpg',
                'halaman' => 162,
                'stok' => 50,
                'rak' => 'A1',
            ],

            [
                'kode_pustaka' => 'TP-002',
                'judul_pustaka' => 'Bahasa Indonesia',
                'kategori_pustaka_id' => 2,
                'penerbit_id' => 1,
                'penulis_id' => 2,
                'tahun' => 2021,
                'gambar_pustaka' => '1721619121.jpg',
                'halaman' => 214,
                'stok' => 18,
                'rak' => 'A2',
            ],

            [
                'kode_pustaka' => 'TP-003',
                'judul_pustaka' => 'Tema 7 Perkembangan Teknologi',
                'kategori_pustaka_id' => 3,
                'penerbit_id' => 1,
                'penulis_id' => 3,
                'tahun' => 2018,
                'gambar_pustaka' => '1721619121.jpg',
                'halaman' => 136,
                'stok' => 20,
                'rak' => 'A3',
            ],

            [
                'kode_pustaka' => 'TP-004',
                'judul_pustaka' => 'Pendidikan Agama Islam',
                'kategori_pustaka_id' => 4,
                'penerbit_id' => 2,
                'penulis_id' => 4,
                'tahun' => 2022,
                'gambar_pustaka' => '1721619121.jpg',
                'halaman' => 176,
                'stok' => 20,
                'rak' => 'A4',
            ],

            [
                'kode_pustaka' => 'TP-005',
                'judul_pustaka' => 'Tema 5 ekosistem',
                'kategori_pustaka_id' => 4,
                'penerbit_id' => 2,
                'penulis_id' => 4,
                'tahun' => 2017,
                'gambar_pustaka' => '1721619121.jpg',
                'halaman' => 186,
                'stok' => 50,
                'rak' => 'A5',
            ],

            [
                'kode_pustaka' => 'TP-006',
                'judul_pustaka' => 'Matematika',
                'kategori_pustaka_id' => 3,
                'penerbit_id' => 2,
                'penulis_id' => 3,
                'tahun' => 2018,
                'gambar_pustaka' => '1721619121.jpg',
                'halaman' => 156,
                'stok' => 51,
                'rak' => 'A6',
            ],

            [
                'kode_pustaka' => 'BC',
                'judul_pustaka' => 'Raja Tiang Kararasen',
                'kategori_pustaka_id' => 2,
                'penerbit_id' => 3,
                'penulis_id' => 2,
                'tahun' => 2013,
                'gambar_pustaka' => '1721619121.jpg',
                'halaman' => 128,
                'stok' => 10,
                'rak' => 'C1',
            ],
            [
                'kode_pustaka' => 'BU',
                'judul_pustaka' => 'Buku Umum Mengenal Wawasan Nusantara',
                'kategori_pustaka_id' => 1,
                'penerbit_id' => 4,
                'penulis_id' => 1,
                'tahun' => 2017,
                'gambar_pustaka' => '1721619121.jpg',
                'halaman' => 76,
                'stok' => 8,
                'rak' => 'C2',
            ],
        ]);
    }
}
