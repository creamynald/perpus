<?php

namespace Database\Seeders\data;

use App\Models\Peminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class peminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peminjaman::insert([
            [
                'kode_peminjaman' => 'KP-DEMO-001',
                'pustaka_id' => 1,
                'tanggal_pinjam' => '2024-07-21',
                'tanggal_kembali' => '2024-07-28',
                'status' => 'diajukan',
                'jenis_denda' => 'harian',
                'denda_non_moneter' => 0,
                'user_id' => 1,
            ],

            [
                'kode_peminjaman' => 'KP-DEMO-002',
                'pustaka_id' => 2,
                'tanggal_pinjam' => '2024-07-21',
                'tanggal_kembali' => '2024-07-28',
                'status' => 'dipinjam',
                'jenis_denda' => 'harian',
                'denda_non_moneter' => 0,
                'user_id' => 1,
            ],

            [
                'kode_peminjaman' => 'KP-DEMO-003',
                'pustaka_id' => 3,
                'tanggal_pinjam' => '2024-07-21',
                'tanggal_kembali' => '2024-07-28',
                'status' => 'dikembalikan',
                'jenis_denda' => 'harian',
                'denda_non_moneter' => 0,
                'user_id' => 1,
            ],

            [
                'kode_peminjaman' => 'KP-DEMO-004',
                'pustaka_id' => 4,
                'tanggal_pinjam' => '2024-07-21',
                'tanggal_kembali' => '2024-07-28',
                'status' => 'dibatalkan',
                'jenis_denda' => 'harian',
                'denda_non_moneter' => 0,
                'user_id' => 1,
            ],
        ]);
    }
}
