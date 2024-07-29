<?php

namespace Database\Seeders\data;

use App\Models\PengaturanAplikasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pengaturanAplikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (PengaturanAplikasi::count() === 0) {
            PengaturanAplikasi::create([
                'nama_aplikasi' => 'PERPUSTAKAAN DIGITAL SD NEGERI 40 BENGKALIS',
                'nama_pimpinan' => 'ADELLIA FITRI',
                'alamat' => 'JL. AWANG MAHMUDA',
                'email' => 'SDN40BENGKALIS@GMAIL.COM',
                'no_telp' => '0812-3456-7890',
                'website' => 'https://sdn40bengkalis.sch.id',
                'logo' => 'logo.png',
            ]);
        }
    }
}
