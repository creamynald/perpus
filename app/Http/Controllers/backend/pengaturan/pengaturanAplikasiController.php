<?php

namespace App\Http\Controllers\backend\pengaturan;

use App\Http\Controllers\Controller;
use App\Models\PengaturanAplikasi;
use Illuminate\Http\Request;

class pengaturanAplikasiController extends Controller
{
    public function index()
    {
        return view('backend.pengaturan.aplikasi.index',[
            'settings' => PengaturanAplikasi::first()
        ]);
    }
}
