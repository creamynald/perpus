<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'lihat.buku']);
        Permission::create(['name' => 'pinjam.buku']);
        Permission::create(['name' => 'delete.buku']);
        Permission::create(['name' => 'edit.buku']);

        Permission::create(['name' => 'lihat.anggota']);
        Permission::create(['name' => 'input.anggota']);
        Permission::create(['name' => 'delete.anggota']);
        Permission::create(['name' => 'edit.anggota']);
        
        Permission::create(['name' => 'lihat.peminjaman']);
        Permission::create(['name' => 'input.peminjaman']);
        Permission::create(['name' => 'delete.peminjaman']);
        Permission::create(['name' => 'edit.peminjaman']);

        Permission::create(['name' => 'lihat.pengembalian']);
        Permission::create(['name' => 'input.pengembalian']);
        Permission::create(['name' => 'delete.pengembalian']);
        Permission::create(['name' => 'edit.pengembalian']);

        Permission::create(['name' => 'lihat.laporan']);
        Permission::create(['name' => 'input.laporan']);
        Permission::create(['name' => 'delete.laporan']);
        Permission::create(['name' => 'edit.laporan']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'siswa']);
        $role1->givePermissionTo('lihat.buku');
        $role1->givePermissionTo('pinjam.buku');
        $role1->givePermissionTo('lihat.anggota');
        $role1->givePermissionTo('lihat.peminjaman');
        $role1->givePermissionTo('lihat.pengembalian');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('lihat.buku');
        $role2->givePermissionTo('pinjam.buku');
        $role2->givePermissionTo('delete.buku');
        $role2->givePermissionTo('edit.buku');
        $role2->givePermissionTo('lihat.anggota');
        $role2->givePermissionTo('input.anggota');
        $role2->givePermissionTo('delete.anggota');
        $role2->givePermissionTo('edit.anggota');
        $role2->givePermissionTo('lihat.peminjaman');
        $role2->givePermissionTo('input.peminjaman');
        $role2->givePermissionTo('delete.peminjaman');
        $role2->givePermissionTo('edit.peminjaman');
        $role2->givePermissionTo('lihat.pengembalian');
        $role2->givePermissionTo('input.pengembalian');
        $role2->givePermissionTo('delete.pengembalian');
        $role2->givePermissionTo('edit.pengembalian');
        $role2->givePermissionTo('lihat.laporan');
        $role2->givePermissionTo('input.laporan');
        $role2->givePermissionTo('delete.laporan');
        $role2->givePermissionTo('edit.laporan');

        $role3 = Role::create(['name' => 'kepsek']);
        $role3->givePermissionTo('lihat.peminjaman');
        $role3->givePermissionTo('lihat.laporan');
        

        $role4 = Role::create(['name' => 'super admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $siswa = \App\Models\User::factory()->create([
            'name' => 'Siswa',
            'email' => 'siswa@perpus.test',
        ]);
        $siswa->assignRole($role1);

        $operator = \App\Models\User::factory()->create([
            'name' => 'Admin Perpus',
            'email' => 'admin@perpus.test',
        ]);
        $operator->assignRole($role2);

        $kepsek = \App\Models\User::factory()->create([
            'name' => 'Kepala Sekolah',
            'email' => 'kepsek@perpus.test',
        ]);
        $kepsek->assignRole($role3);

        $superadmin = \App\Models\User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@perpus.test',
        ]);
        $superadmin->assignRole($role4);
    }
}
