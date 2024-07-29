<?php

use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\laporan\lapAnggotaController;
use App\Http\Controllers\backend\laporan\lapPeminjamanController;
use App\Http\Controllers\backend\laporan\lapPustakaController;
use App\Http\Controllers\backend\peminjaman\peminjamanController;
use App\Http\Controllers\backend\pengaturan\anggotaController;
use App\Http\Controllers\backend\pengaturan\pengaturanAplikasiController;
use App\Http\Controllers\backend\permissions\{assignController, roleController, permissionController, userController};
use App\Http\Controllers\backend\pustaka\{kategoriPustakaController, penerbitController, penulisController, pustakaController};
use App\Models\Anggota;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('has.role')
    ->prefix('admin')
    ->group(function () {
        Route::get('dashboard', [dashboardController::class, 'index'])->name('dashboard');
        Route::prefix('role-and-permission')
            ->middleware('permission:permission')
            ->group(function () {
                Route::resource('roles', roleController::class);
                Route::resource('permissions', permissionController::class);
                Route::resource('assignable', assignController::class);
                Route::resource('assign/user', userController::class);
            });
        Route::prefix('peminjaman')->group(function () {
            Route::resource('pinjam-buku', peminjamanController::class);
            Route::post('pinjam-buku/verifikasi/{id}', [peminjamanController::class, 'verifikasi'])->name('pinjam-buku.verifikasi');
            Route::post('pinjam-buku/verifikasi-pengembalian/{id}', [peminjamanController::class, 'verifikasiPengembalian'])->name('pinjam-buku.verifikasi-pengembalian');
            Route::get('/pinjam-buku/invoice/{id}', [App\Http\Controllers\backend\peminjaman\peminjamanController::class, 'invoice'])->name('pinjam-buku.invoice');
        });
        Route::prefix('pustaka')->group(function () {
            Route::resource('kategori', kategoriPustakaController::class);
            Route::resource('penulis', penulisController::class);
            Route::resource('penerbit', penerbitController::class);
            Route::resource('buku', pustakaController::class);
            Route::get('/buku/search', [PustakaController::class, 'search'])->name('buku.search');
            Route::post('pinjam-buku/verifikasi/{id}', [App\Http\Controllers\backend\peminjaman\peminjamanController::class, 'verifikasi'])->name('pinjam-buku.verifikasi');
            Route::get('/pinjam-buku/{id}', [PustakaController::class, 'pinjam'])->name('pinjam');
        });
        Route::prefix('laporan')->group(function () {
            Route::get('lap-peminjaman', [lapPeminjamanController::class, 'index'])->name('lap-peminjaman.index');
            Route::get('lap-peminjaman/pdf', [lapPeminjamanController::class, 'exportPdf'])->name('lap-peminjaman.pdf');

            Route::get('lap-pustaka', [lapPustakaController::class, 'index'])->name('lap-pustaka.index');
            Route::get('lap-pustaka/pdf', [lapPustakaController::class, 'exportPdf'])->name('lap-pustaka.pdf');

            Route::get('lap-anggota', [lapAnggotaController::class, 'index'])->name('lap-anggota.index');
            Route::get('lap-anggota/pdf', [lapAnggotaController::class, 'exportPdf'])->name('lap-anggota.pdf');
        });
        Route::prefix('pengaturan')->group(function () {
            Route::resource('anggota', anggotaController::class);
            Route::resource('aplikasi', pengaturanAplikasiController::class);
        });
    });

// debug only
Route::get('/routes', function () {
    return \Illuminate\Support\Facades\Route::getRoutes();
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
