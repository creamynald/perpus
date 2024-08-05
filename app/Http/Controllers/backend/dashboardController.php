<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Pustaka;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $year = date('Y');

        // Get total count per month based on tanggal_pinjam and each status
        // Example adjustment in controller if needed
        $monthlyStatus = Peminjaman::selectRaw(
            'MONTH(tanggal_pinjam) as month,
            SUM(CASE WHEN status = "diajukan" THEN 1 ELSE 0 END) as diajukan_count,
            SUM(CASE WHEN status = "dipinjam" THEN 1 ELSE 0 END) as dipinjam_count,
            SUM(CASE WHEN status = "dikembalikan" THEN 1 ELSE 0 END) as dikembalikan_count,
            SUM(CASE WHEN status = "dibatalkan" THEN 1 ELSE 0 END) as dibatalkan_count',
        )
            ->whereYear('tanggal_pinjam', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->mapWithKeys(function ($item) {
                return [
                    $item->month => [
                        'diajukan' => (int) $item->diajukan_count,
                        'dipinjam' => (int) $item->dipinjam_count,
                        'dikembalikan' => (int) $item->dikembalikan_count,
                        'dibatalkan' => (int) $item->dibatalkan_count,
                    ],
                ];
            })
            ->toArray();

        // Fill missing months with 0
        for ($i = 1; $i <= 12; $i++) {
            if (!isset($monthlyStatus[$i])) {
                $monthlyStatus[$i] = ['diajukan' => 0, 'dipinjam' => 0, 'dikembalikan' => 0, 'dibatalkan' => 0];
            }
        }

        // denda non moneter adalah siswa yang belum mengembalikan buku lebih dari 7 hari dari created at user role siswa
        $jumlahUserTerlambat = Peminjaman::where('tanggal_pinjam', '<', now()->subDays(7)) // Buku dipinjam lebih dari 7 hari lalu
            ->where('status', 'dipinjam')
            ->whereHas('user', function ($query) {
                $query->whereHas('roles', function ($query) {
                    $query->where('name', 'siswa'); // Memeriksa role dengan nama 'siswa'
                });
            })
            ->distinct('user_id') // Pastikan hanya menghitung pengguna unik
            ->count('user_id'); // Hitung jumlah pengguna unik

        // dd($tanggalPinjamBukuUser);

        return view('backend.dashboard', [
            'totalPeminjaman' => Peminjaman::whereYear('tanggal_pinjam', $year)->count(),
            'totalPeminjamanUser' => Peminjaman::where('user_id', auth()->id())->count(),
            'totalAnggota' => User::role('siswa')->count(),
            'totalPustaka' => Pustaka::count(),
            'pointSaya' => User::where('id', auth()->id())->first()->point,
            'monthlyDiajukan' => array_column($monthlyStatus, 'diajukan'),
            'monthlyDipinjam' => array_column($monthlyStatus, 'dipinjam'),
            'monthlyDikembalikan' => array_column($monthlyStatus, 'dikembalikan'),
            'monthlyDibatalkan' => array_column($monthlyStatus, 'dibatalkan'),
            'dendaNonMoneter' => $jumlahUserTerlambat,
        ]);
    }
}
