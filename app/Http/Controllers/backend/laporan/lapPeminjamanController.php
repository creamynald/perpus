<?php

namespace App\Http\Controllers\backend\laporan;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class lapPeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $peminjaman = collect();

        if ($request->has('tgl_awal') && $request->has('tgl_akhir')) {
            $peminjaman = Peminjaman::whereBetween('tanggal_pinjam', [$request->tgl_awal, $request->tgl_akhir])->get();
        }

        return view('backend.laporan.lapPeminjaman.index', compact('peminjaman'));
    }
}
