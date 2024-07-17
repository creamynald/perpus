<?php

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
        Route::get('dashboard', function () {
            return view('backend.dashboard');
        })->name('dashboard');
        Route::prefix('role-and-permission')
            ->middleware('permission:permission')
            ->group(function () {
                Route::resource('roles', roleController::class);
                Route::resource('permissions', permissionController::class);
                Route::resource('assignable', assignController::class);
                Route::resource('assign/user', userController::class);
            });
        Route::prefix('pustaka')->group(function () {
            Route::resource('kategori', kategoriPustakaController::class);
            Route::resource('penulis', penulisController::class);
            Route::resource('penerbit', penerbitController::class);
            Route::resource('buku', pustakaController::class);
        });
        Route::prefix('pengaturan')->group(function () {
            Route::resource('anggota', anggotaController::class);
            Route::resource('aplikasi', pengaturanAplikasiController::class);
        });
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
