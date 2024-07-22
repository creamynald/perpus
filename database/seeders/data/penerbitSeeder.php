<?php

namespace Database\Seeders\data;

use App\Models\Penerbit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class penerbitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penerbit::insert([
            [
                'kode_penerbit' => 'KP-GB',
                'nama_penerbit' => 'Greenbook ID',
            ],

            [
                'kode_penerbit' => 'KP-GRMD',
                'nama_penerbit' => 'Gramedia Pustaka Utama',
            ],

            [
                'kode_penerbit' => 'KP-MP',
                'nama_penerbit' => 'Mizan Publishing',
            ],

            [
                'kode_penerbit' => 'KP-ERLG',
                'nama_penerbit' => 'Erlangga',
            ],
        ]);
    }
}
