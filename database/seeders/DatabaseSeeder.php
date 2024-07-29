<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\data\bukuSeeder;
use Database\Seeders\data\kategoriSeeder;
use Database\Seeders\data\peminjamanSeeder;
use Database\Seeders\data\penerbitSeeder;
use Database\Seeders\data\pengaturanAplikasiSeeder;
use Database\Seeders\data\penulisSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class, 
            kategoriSeeder::class,
            penulisSeeder::class,
            penerbitSeeder::class,
            bukuSeeder::class, 
            peminjamanSeeder::class,
            pengaturanAplikasiSeeder::class,
        ]);
    }
}
