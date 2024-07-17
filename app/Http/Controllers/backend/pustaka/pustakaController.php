<?php

namespace App\Http\Controllers\backend\pustaka;

use App\Http\Controllers\Controller;
use App\Models\{kategoriPustaka, Penerbit, Penulis, Pustaka};
use Illuminate\Http\Request;

class pustakaController extends Controller
{
    public function index()
    {
        return view('backend.pustaka.buku.index');
    }

    public function create()
    {
        return view('backend.pustaka.buku.create', [
            'kategori' => kategoriPustaka::all(),
            'penulis' => Penulis::all(),
            'penerbit' => Penerbit::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_pustaka' => 'required',
            'judul_pustaka' => 'required',
            'kategori_pustaka_id' => 'required',
            'penerbit_id' => 'required',
            'penulis_id' => 'required',
            'tahun' => 'required',
            'gambar_pustaka' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'halaman' => 'required',
            'stok' => 'required',
            'rak' => 'required',
        ]);

        $gambar = $request->file('gambar_pustaka');
        $nama_gambar = time() . '.' . $gambar->extension();
        $gambar->move(public_path('img/pustaka'), $nama_gambar);

        $pustaka = new Pustaka();
        $pustaka->kode_pustaka = $request->kode_pustaka;
        $pustaka->judul_pustaka = $request->judul_pustaka;
        $pustaka->kategori_pustaka_id = $request->kategori_pustaka_id;
        $pustaka->penerbit_id = $request->penerbit_id;
        $pustaka->penulis_id = $request->penulis_id;
        $pustaka->tahun = $request->tahun;
        $pustaka->gambar_pustaka = $nama_gambar;
        $pustaka->halaman = $request->halaman;
        $pustaka->stok = $request->stok;
        $pustaka->rak = $request->rak;
        $pustaka->save();

        return redirect()->route('buku.index')->with('success', 'Data berhasil ditambahkan');
    
    }
}
