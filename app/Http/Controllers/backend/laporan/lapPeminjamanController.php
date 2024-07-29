<?php

namespace App\Http\Controllers\backend\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class lapPeminjamanController extends Controller
{
    public function index()
    {
        return view('backend.laporan.lapPeminjaman.index');
    }
}
