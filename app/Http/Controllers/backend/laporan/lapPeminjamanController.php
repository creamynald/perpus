<?php

namespace App\Http\Controllers\backend\laporan;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class lapPeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $query = Peminjaman::query();

        if ($request->has('tgl_awal') && $request->has('tgl_akhir')) {
            $query->whereBetween('tanggal_pinjam', [$request->tgl_awal, $request->tgl_akhir]);
        }

        $peminjaman = $query->get();

        return view('backend.laporan.lapPeminjaman.index', compact('peminjaman'));
    }

    public function exportPdf(Request $request)
    {
        $pdf = Pdf::loadView('backend.laporan.lapPeminjaman.peminjaman_pdf', compact('peminjaman'));
        return $pdf->download('laporan_peminjaman.pdf');
    }
}
