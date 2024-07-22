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
                'kode_penulis' => 'KP-DEMO-001',
                'nama_penulis' => 'Tere Liye',
            ],

            [
                'kode_penulis' => 'KP-DEMO-002',
                'nama_penulis' => 'Raditya Dika',
            ],

            [
                'kode_penulis' => 'KP-DEMO-003',
                'nama_penulis' => 'Andrea Hirata',
            ],

            [
                'kode_penulis' => 'KP-DEMO-004',
                'nama_penulis' => 'Ika Natassa',
            ],
        ]);
    }
}