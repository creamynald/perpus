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
                'kode_kategori_pustaka' => 'TP',
                'nama_kategori_pustaka' => 'Tema/Pelajaran',
            ],

            [
                'kode_kategori_pustaka' => 'BC',
                'nama_kategori_pustaka' => 'Buku Cerita',
            ],

            [
                'kode_kategori_pustaka' => 'BU',
                'nama_kategori_pustaka' => 'Buku Umum',
            ],

            [
                'kode_kategori_pustaka' => 'CRPN',
                'nama_kategori_pustaka' => 'Cerita Pendek (CERPEN)',
            ],
        ]);
    }
}
