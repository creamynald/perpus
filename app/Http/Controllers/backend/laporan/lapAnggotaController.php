<?php

namespace App\Http\Controllers\backend\laporan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class lapAnggotaController extends Controller
{
    public function index()
    {
        return view('backend.laporan.lapAnggota.index', [
            'anggota' => User::role('siswa')->orderBy('point', 'desc')->get(),
        ]);
    }

    public function exportPdf(Request $request)
    {
        $pdf = Pdf::loadView('backend.laporan.lapAnggota.anggota_pdf', [
            'anggota' => User::role('siswa')->get(),
        ]);
        return $pdf->download('laporan_anggota.pdf');
    }
}
