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
                'kode_penerbit' => 'Pn-Tp-001',
                'nama_penerbit' => 'Kemendikbud',
            ],

            [
                'kode_penerbit' => 'Pn-Tp-002',
                'nama_penerbit' => 'Erlangga',
            ],

            [
                'kode_penerbit' => 'Pn-Tp-003',
                'nama_penerbit' => 'Bumi Aksara',
            ],

            [
                'kode_penerbit' => 'Pn-Tp-004',
                'nama_penerbit' => 'Balai Pustaka',
            ],
        ]);
    }
}
