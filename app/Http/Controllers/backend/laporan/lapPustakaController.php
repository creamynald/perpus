<?php

namespace App\Http\Controllers\backend\laporan;

use App\Http\Controllers\Controller;
use App\Models\Pustaka;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class lapPustakaController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.laporan.lapPustaka.index', [
            'pustaka' => Pustaka::all(),
        ]);
    }

    public function exportPdf(Request $request)
    {
        $query = Pustaka::query();

        if ($request->has('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $pustaka = $query->get();

        $pdf = Pdf::loadView('backend.laporan.lapPustaka.pustaka_pdf', compact('pustaka'));
        return $pdf->download('laporan_pustaka.pdf');
    }
}
