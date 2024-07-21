<?php

namespace App\Http\Controllers\backend\pustaka;

use App\Http\Controllers\Controller;
use App\Models\{kategoriPustaka, Penerbit, Penulis, Pustaka};
use Illuminate\Http\Request;
use Alert;

class pustakaController extends Controller
{
    public function index()
    {
        return view('backend.pustaka.buku.index', [
            'pustaka' => Pustaka::latest()->get(),
        ]);
    }

    public function show($id)
    {
        return view('backend.pustaka.buku.show', [
            'pustaka' => Pustaka::findOrFail($id),
        ]);
    }

    public function search(Request $request)
    {
        $query = Pustaka::query();

        if ($request->filled('kategori')) {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('nama_kategori_pustaka', 'like', '%' . $request->kategori . '%');
            });
        }

        if ($request->filled('penulis')) {
            $query->whereHas('penulis', function ($q) use ($request) {
                $q->where('nama_penulis', 'like', '%' . $request->penulis . '%');
            });
        }

        if ($request->filled('penerbit')) {
            $query->whereHas('penerbit', function ($q) use ($request) {
                $q->where('nama_penerbit', 'like', '%' . $request->penerbit . '%');
            });
        }

        $pustaka = $query->get();

        return view('backend.pustaka.buku.index', compact('pustaka'));
    }

    public function create()
    {
        return view('backend.pustaka.buku.create', [
            'kategori' => kategoriPustaka::all(),
            'penulis' => Penulis::all(),
            'penerbit' => Penerbit::all(),
        ]);
    }

    public function edit($id)
    {
        return view('backend.pustaka.buku.edit', [
            'pustaka' => Pustaka::findOrFail($id),
            'kategori' => kategoriPustaka::all(),
            'penulis' => Penulis::all(),
            'penerbit' => Penerbit::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'kode_pustaka' => 'required',
                'judul_pustaka' => 'required',
                'kategori_pustaka_id' => 'required',
                'penerbit_id' => 'required',
                'penulis_id' => 'required',
                'tahun' => 'required',
                'gambar_pustaka' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
                'halaman' => 'required',
                'stok' => 'required',
                'rak' => 'required',
            ],
            [
                'kode_pustaka.required' => 'Kode pustaka wajib diisi',
                'judul_pustaka.required' => 'Judul pustaka wajib diisi',
                'kategori_pustaka_id.required' => 'Kategori pustaka wajib diisi',
                'penerbit_id.required' => 'Penerbit wajib diisi',
                'penulis_id.required' => 'Penulis wajib diisi',
                'tahun.required' => 'Tahun wajib diisi',
                'gambar_pustaka.file' => 'Gambar pustaka harus berupa file',
                'gambar_pustaka.image' => 'Gambar pustaka harus berupa gambar',
                'gambar_pustaka.mimes' => 'Gambar pustaka harus berformat jpeg, png, jpg',
                'gambar_pustaka.max' => 'Ukuran gambar pustaka maksimal 2MB',
                'halaman.required' => 'Halaman wajib diisi',
            ],
        );

        try {
            $pustaka = Pustaka::findOrFail($id);

            // Update gambar jika ada file gambar baru
            if ($request->hasFile('gambar_pustaka')) {
                // Hapus gambar lama jika ada
                if ($pustaka->gambar_pustaka && file_exists(public_path('img/pustaka/' . $pustaka->gambar_pustaka))) {
                    unlink(public_path('img/pustaka/' . $pustaka->gambar_pustaka));
                }

                $gambar = $request->file('gambar_pustaka');
                $nama_gambar = time() . '.' . $gambar->extension();
                $gambar->move(public_path('img/pustaka'), $nama_gambar);
                $pustaka->gambar_pustaka = $nama_gambar;
            }

            // Update data pustaka lainnya
            $pustaka->kode_pustaka = $request->kode_pustaka;
            $pustaka->judul_pustaka = $request->judul_pustaka;
            $pustaka->kategori_pustaka_id = $request->kategori_pustaka_id;
            $pustaka->penerbit_id = $request->penerbit_id;
            $pustaka->penulis_id = $request->penulis_id;
            $pustaka->tahun = $request->tahun;
            $pustaka->halaman = $request->halaman;
            $pustaka->stok = $request->stok;
            $pustaka->rak = $request->rak;
            $pustaka->save();

            toast('Data berhasil diperbarui', 'success');
            return redirect()->route('buku.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $request->validate(
            [
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
            ],
            [
                'kode_pustaka.required' => 'Kode pustaka wajib diisi',
                'judul_pustaka.required' => 'Judul pustaka wajib diisi',
                'kategori_pustaka_id.required' => 'Kategori pustaka wajib diisi',
                'penerbit_id.required' => 'Penerbit wajib diisi',
                'penulis_id.required' => 'Penulis wajib diisi',
                'tahun.required' => 'Tahun wajib diisi',
                'gambar_pustaka.required' => 'Gambar pustaka wajib diisi',
                'gambar_pustaka.file' => 'Gambar pustaka harus berupa file',
                'gambar_pustaka.image' => 'Gambar pustaka harus berupa gambar',
                'gambar_pustaka.mimes' => 'Gambar pustaka harus berformat jpeg, png, jpg',
                'gambar_pustaka.max' => 'Ukuran gambar pustaka maksimal 2MB',
                'halaman.required' => 'Halaman wajib diisi',
            ],
        );

        try {
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

            toast('Data berhasil ditambahkan', 'success');
            return redirect()->route('buku.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $pustaka = Pustaka::findOrFail($id);
            $pustaka->delete();

            toast('Data berhasil dihapus', 'success');
            return redirect()->route('buku.index');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
