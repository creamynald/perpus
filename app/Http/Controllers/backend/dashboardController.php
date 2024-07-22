<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Pustaka;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        return view('backend.dashboard', [
            'totalPeminjaman' => Peminjaman::whereYear('created_at', date('Y'))->count(),
            'totalAnggota' => User::role('siswa')->count(),
            'totalPustaka' => Pustaka::count(),
            'totalDendaNonMoneter' => Peminjaman::where('denda_non_moneter', '!=', 0)->count(),
            'pointSiswa' => User::role('siswa')->sum('point'),
        ]);
    }
}
