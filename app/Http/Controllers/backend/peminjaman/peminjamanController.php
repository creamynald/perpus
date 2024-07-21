<?php

namespace App\Http\Controllers\backend\peminjaman;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Pustaka;
use App\Models\User;
use Illuminate\Http\Request;

class peminjamanController extends Controller
{
    public function index()
    {
        if (
            auth()
                ->user()
                ->hasRole(['admin', 'super admin'])
        ) {
            return view('backend.peminjaman.index', [
                'dataPeminjaman' => Peminjaman::latest()->get(),
            ]);
        } else {
            return view('backend.peminjaman.index', [
                'dataPeminjaman' => Peminjaman::where('user_id', auth()->id())->latest()->get(),
            ]);
        }
    }

    public function create()
    {
        return view('backend.peminjaman.create', [
            'dataSiswa' => User::role('siswa')->orderBy('name', 'asc')->get(),
            'dataBuku' => Pustaka::orderBy('judul_pustaka', 'asc')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'user_id' => 'required',
                'pustaka_id' => 'required',
                'tanggal_pinjam' => 'required',
                'tanggal_kembali' => 'required',
            ],
            [
                'user_id.required' => 'Siswa harus diisi',
                'pustaka_id.required' => 'Buku harus diisi',
                'tanggal_pinjam.required' => 'Tanggal pinjam harus diisi',
                'tanggal_kembali.required' => 'Tanggal kembali harus diisi',
            ],
        );

        // Cek apakah stok buku masih tersedia
        $cekStok = Pustaka::find($request->pustaka_id);

        if ($cekStok->stok == 0) {
            return redirect()->back()->with('error', 'Stok buku sudah habis');
        }

        // Kurangi stok buku
        $cekStok->update([
            'stok' => $cekStok->stok - 1,
        ]);

        // generate kode peminjaman
        $kodePeminjaman = 'PM' . date('Ymd') . rand(100, 999);

        Peminjaman::create([
            'kode_peminjaman' => $kodePeminjaman,
            'user_id' => $request->user_id,
            'pustaka_id' => $request->pustaka_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'dipinjam',
        ]);

        return redirect()->route('pinjam-buku.index')->with('success', 'Data peminjaman berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('backend.peminjaman.edit', [
            'data' => Peminjaman::find($id),
            'dataSiswa' => User::role('siswa')->orderBy('name', 'asc')->get(),
            'dataBuku' => Pustaka::orderBy('judul_pustaka', 'asc')->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'user_id' => 'required',
                'pustaka_id' => 'required',
                'tanggal_pinjam' => 'required|date',
                'tanggal_kembali' => 'required|date',
            ],
            [
                'user_id.required' => 'Siswa harus diisi',
                'pustaka_id.required' => 'Buku harus diisi',
                'tanggal_pinjam.required' => 'Tanggal pinjam harus diisi',
                'tanggal_kembali.required' => 'Tanggal kembali harus diisi',
            ],
        );

        $peminjaman = Peminjaman::find($id);

        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Peminjaman tidak ditemukan');
        }

        // Add stock to the old book
        $oldBook = Pustaka::find($peminjaman->pustaka_id);
        if ($oldBook) {
            $oldBook->update(['stok' => $oldBook->stok + 1]);
        }

        // Reduce stock of the new book
        $newBook = Pustaka::find($request->pustaka_id);
        if (!$newBook) {
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }

        if ($newBook->stok <= 0) {
            return redirect()->back()->with('error', 'Stok buku sudah habis');
        }

        $newBook->update(['stok' => $newBook->stok - 1]);

        // Update the peminjaman record
        $peminjaman->update([
            'user_id' => $request->user_id,
            'pustaka_id' => $request->pustaka_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'dipinjam',
        ]);

        return redirect()->route('pinjam-buku.index')->with('success', 'Data peminjaman berhasil diubah');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::find($id);

        // Tambah stok buku
        $cekStok = Pustaka::find($peminjaman->pustaka_id);
        $cekStok->update([
            'stok' => $cekStok->stok + 1,
        ]);

        $peminjaman->delete();

        return redirect()->route('pinjam-buku.index')->with('success', 'Data peminjaman berhasil dihapus');
    }
}
