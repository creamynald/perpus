<?php

namespace App\Http\Controllers\backend\pustaka;

use App\Http\Controllers\Controller;
use App\Models\Penulis;
use Illuminate\Http\Request;

class penulisController extends Controller
{
    public function index()
    {
        $penulis = Penulis::all();
        return view('backend.pustaka.penulis.index', compact('penulis'));
    }

    public function create()
    {
        $penulis = new Penulis();
        return view('backend.pustaka.penulis.create', compact('penulis'));
    }

    public function store()
    {
        request()->validate([
            'kode_penulis' => 'required',
            'nama_penulis' => 'required',
        ]);

        Penulis::create([
            'kode_penulis' => request('kode_penulis'),
            'nama_penulis' => request('nama_penulis'),
        ]);

        return redirect()->route('penulis.index');
    }

    public function edit(Penulis $penulis)
    {
        return view('backend.pustaka.penulis.edit', [
            'penulis' => $penulis,
            'submit' => 'Update'
        ]);
    }
    
    public function update(Penulis $penulis)
    {
        request()->validate([
            'kode_penulis' => 'required',
            'nama_penulis' => 'required',
        ]);

        $penulis->update([
            'kode_penulis' => request('kode_penulis'),
            'nama_penulis' => request('nama_penulis'),
        ]);

        return redirect()->route('penulis.index');
    }
    
    public function destroy(Penulis $penulis)
    {
        $penulis->delete();
        return redirect()->route('penulis.index');
    }
}
