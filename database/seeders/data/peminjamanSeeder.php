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
        $tanggalPinjam = date('Y-m-d');
        $tanggalKembali = date('Y-m-d', strtotime('+7 days', strtotime($tanggalPinjam)));

        $status = ['diajukan', 'dipinjam', 'dikembalikan', 'dibatalkan'];
        $getStatusRandom = array_rand($status);

        Peminjaman::insert([
            [
                'kode_peminjaman' => 'PM20240805001',
                'pustaka_id' => 1,
                'tanggal_pinjam' => $tanggalPinjam,
                'tanggal_kembali' => $tanggalKembali,
                'status' => $getStatusRandom,
                'user_id' => 1,
            ],

            [
                'kode_peminjaman' => 'PM20240805002',
                'pustaka_id' => 2,
                'tanggal_pinjam' => $tanggalPinjam,
                'tanggal_kembali' => $tanggalKembali,
                'status' => $getStatusRandom,
                'user_id' => 2,
            ],

            [
                'kode_peminjaman' => 'PM20240805003',
                'pustaka_id' => 3,
                'tanggal_pinjam' => $tanggalPinjam,
                'tanggal_kembali' => $tanggalKembali,
                'status' => $getStatusRandom,
                'user_id' => 2,
            ],

            [
                'kode_peminjaman' => 'PM20240805004',
                'pustaka_id' => 4,
                'tanggal_pinjam' => $tanggalPinjam,
                'tanggal_kembali' => $tanggalKembali,
                'status' => $getStatusRandom,
                'user_id' => 1,
            ],

            [
                'kode_peminjaman' => 'PM20240805005',
                'pustaka_id' => 5,
                'tanggal_pinjam' => $tanggalPinjam,
                'tanggal_kembali' => $tanggalKembali,
                'status' => $getStatusRandom,
                'user_id' => 2,
            ],

            [
                'kode_peminjaman' => 'PM20240805006',
                'pustaka_id' => 6,
                'tanggal_pinjam' => $tanggalPinjam,
                'tanggal_kembali' => $tanggalKembali,
                'status' => $getStatusRandom,
                'user_id' => 2,
            ],

            [
                'kode_peminjaman' => 'PM20240805007',
                'pustaka_id' => 7,
                'tanggal_pinjam' => $tanggalPinjam,
                'tanggal_kembali' => $tanggalKembali,
                'status' => $getStatusRandom,
                'user_id' => 1,
            ],

            [
                'kode_peminjaman' => 'PM20240805008',
                'pustaka_id' => 8,
                'tanggal_pinjam' => $tanggalPinjam,
                'tanggal_kembali' => $tanggalKembali,
                'status' => $getStatusRandom,
                'user_id' => 8,
            ],
            
        ]);
    }
}
