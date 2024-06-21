<?php

namespace App\Http\Controllers\backend\pustaka;

use App\Http\Controllers\Controller;
use App\Models\kategoriPustaka;
use Illuminate\Http\Request;

class kategoriPustakaController extends Controller
{
    public function index()
    {
        $kategori = kategoriPustaka::all();
        return view('backend.pustaka.kategori.index', compact('kategori'));
    }

    public function create()
    {
        $kategori = new kategoriPustaka();
        return view('backend.pustaka.kategori.create', compact('kategori'));
    }

    public function store()
    {
        request()->validate([
            'kode_kategori_pustaka' => 'required',
            'nama_kategori_pustaka' => 'required',
            'gambar_kategori_pustaka' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        kategoriPustaka::create([
            'kode_kategori_pustaka' => request('kode_kategori_pustaka'),
            'nama_kategori_pustaka' => request('nama_kategori_pustaka'),
        ]);

        return redirect()->route('kategori.index');
    }

    public function edit(kategoriPustaka $kategori)
    {
        return view('backend.pustaka.kategori.edit', [
            'kategori' => $kategori,
            'submit' => 'Update'
        ]);
    }

    public function update(kategoriPustaka $kategori)
    {
        request()->validate([
            'kode_kategori_pustaka' => 'required',
            'nama_kategori_pustaka' => 'required',
            'gambar_kategori_pustaka' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $kategori->update([
            'kode_kategori_pustaka' => request('kode_kategori_pustaka'),
            'nama_kategori_pustaka' => request('nama_kategori_pustaka'),
        ]);

        return redirect()->route('kategori.index');
    }

    public function destroy(kategoriPustaka $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index');
    }
}
