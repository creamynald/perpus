<?php

namespace Database\Seeders\data;

use App\Models\Penulis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class penulisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penulis::insert([
            [
                'kode_penulis' => 'Ps-Tp-001',
                'nama_penulis' => 'Yusfina Hendrifiana',
            ],

            [
                'kode_penulis' => 'Ps-Tp-002',
                'nama_penulis' => 'Novika Adelina',
            ],

            [
                'kode_penulis' => 'Ps-Tp-003',
                'nama_penulis' => 'Ari Pudjrastuti, dkk',
            ],

            [
                'kode_penulis' => 'Ps-Tp-004',
                'nama_penulis' => 'Irene MJA, dkk',
            ],

            [
                'kode_penulis' => 'Ps-Tp-005',
                'nama_penulis' => 'Haryanto',
            ],

            [
                'kode_penulis' => 'Ps-Bc',
                'nama_penulis' => 'Maulana Syamsuri',
            ],

            [
                'kode_penulis' => 'Ps-Bc',
                'nama_penulis' => 'Arryanti',
            ],
        ]);
    }
}