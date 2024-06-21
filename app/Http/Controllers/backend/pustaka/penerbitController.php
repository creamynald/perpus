<?php

namespace App\Http\Controllers\backend\pustaka;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class penerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        return view('backend.pustaka.penerbit.index', compact('penerbit'));
    }

    public function create()
    {
        $penerbit = new Penerbit();
        return view('backend.pustaka.penerbit.create', compact('penerbit'));
    }

    public function store()
    {
        request()->validate([
            'kode_penerbit' => 'required',
            'nama_penerbit' => 'required',
        ]);

        Penerbit::create([
            'kode_penerbit' => request('kode_penerbit'),
            'nama_penerbit' => request('nama_penerbit'),
        ]);

        return redirect()->route('penerbit.index');
    }

    public function edit(Penerbit $penerbit)
    {
        return view('backend.pustaka.penerbit.edit', [
            'penerbit' => $penerbit,
            'submit' => 'Update',
        ]);
    }

    public function update(Penerbit $penerbit)
    {
        request()->validate([
            'kode_penerbit' => 'required',
            'nama_penerbit' => 'required',
        ]);

        $penerbit->update([
            'kode_penerbit' => request('kode_penerbit'),
            'nama_penerbit' => request('nama_penerbit'),
        ]);

        return redirect()->route('penerbit.index');
    }

    public function destroy(Penerbit $penerbit)
    {
        $penerbit->delete();
        return redirect()->route('penerbit.index');
    }
}
