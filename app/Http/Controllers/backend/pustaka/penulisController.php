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

    public function edit(Penulis $penuli)
    {
        return view('backend.pustaka.penulis.edit', [
            'penulis' => $penuli,
            'submit' => 'Update'
        ]);
    }
    
    public function update(Penulis $penuli)
    {
        request()->validate([
            'kode_penulis' => 'required',
            'nama_penulis' => 'required',
        ]);

        $penuli->update([
            'kode_penulis' => request('kode_penulis'),
            'nama_penulis' => request('nama_penulis'),
        ]);

        return redirect()->route('penulis.index');
    }
    
    public function destroy(Penulis $penuli)
    {
        $penuli->delete();
        return redirect()->route('penulis.index');
    }
}
