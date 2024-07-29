<?php

namespace App\Http\Controllers\backend\peminjaman;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\PengaturanAplikasi;
use App\Models\Pustaka;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class peminjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:siswa|admin|super admin');
    }

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
        $currentUser = auth()->user();

        if ($currentUser->hasRole('siswa')) {
            $dataSiswa = User::where('id', $currentUser->id)->get();
        } else {
            $dataSiswa = User::role('siswa')->orderBy('name', 'asc')->get();
        }

        return view('backend.peminjaman.create', [
            'dataSiswa' => $dataSiswa,
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

        $cekStok = Pustaka::find($request->pustaka_id);

        if ($cekStok->stok == 0) {
            return redirect()->back()->with('error', 'Stok buku sudah habis');
        }

        // Check if the user is a student
        if (auth()->user()->hasRole('siswa')) {
            $totalPeminjaman = Peminjaman::where('user_id', $request->user_id)
                ->whereIn('status', ['diajukan', 'dipinjam'])
                ->count();

            if ($totalPeminjaman >= 3) {
                return redirect()->back()->with('error', 'Siswa hanya diperbolehkan meminjam maksimal 3 buku');
            }
        }

        // Update the stock of the book
        $cekStok->update([
            'stok' => $cekStok->stok - 1,
        ]);

        $status = auth()->user()->hasRole('siswa') ? 'diajukan' : 'dipinjam';

        $kodePeminjaman = 'PM' . date('Ymd') . rand(100, 999);

        Peminjaman::create([
            'kode_peminjaman' => $kodePeminjaman,
            'user_id' => $request->user_id,
            'pustaka_id' => $request->pustaka_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => $status,
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
                'tanggal_pinjam' => 'date',
                'tanggal_kembali' => 'date',
            ],
            [
                'user_id.required' => 'Siswa harus diisi',
                'pustaka_id.required' => 'Buku harus diisi',
                'tanggal_pinjam.date' => 'Tanggal pinjam harus diisi',
                'tanggal_kembali.date' => 'Tanggal kembali harus diisi',
            ],
        );

        $peminjaman = Peminjaman::find($id);

        if (!$peminjaman) {
            return redirect()->back()->with('error', 'Peminjaman tidak ditemukan');
        }

        $oldBook = Pustaka::find($peminjaman->pustaka_id);
        if ($oldBook) {
            $oldBook->update(['stok' => $oldBook->stok + 1]);
        }

        $newBook = Pustaka::find($request->pustaka_id);
        if (!$newBook) {
            return redirect()->back()->with('error', 'Buku tidak ditemukan');
        }

        if ($newBook->stok <= 0) {
            return redirect()->back()->with('error', 'Stok buku sudah habis');
        }

        $newBook->update(['stok' => $newBook->stok - 1]);

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

        $cekStok = Pustaka::find($peminjaman->pustaka_id);
        $cekStok->update([
            'stok' => $cekStok->stok + 1,
        ]);

        $peminjaman->delete();

        return redirect()->route('pinjam-buku.index')->with('success', 'Data peminjaman berhasil dihapus');
    }

    public function verifikasi($id)
    {
        $peminjaman = Peminjaman::find($id);

        if (!$peminjaman || $peminjaman->status != 'diajukan') {
            return redirect()->route('pinjam-buku.index')->with('error', 'Peminjaman tidak valid untuk diverifikasi');
        }

        $peminjaman->update([
            'status' => 'dipinjam',
        ]);

        // user point
        $user = User::find($peminjaman->user_id);
        $user->update([
            'point' => $user->point + 1,
        ]);

        return redirect()->route('pinjam-buku.index')->with('success', 'Peminjaman berhasil diverifikasi');
    }

    public function verifikasiPengembalian($id)
    {
        $peminjaman = Peminjaman::find($id);

        if (!$peminjaman || $peminjaman->status != 'dipinjam') {
            return redirect()->route('pinjam-buku.index')->with('error', 'Peminjaman tidak valid untuk diverifikasi pengembaliannya');
        }

        $peminjaman->update([
            'status' => 'dikembalikan',
        ]);

        // Tambah poin ke user
        $user = User::find($peminjaman->user_id);
        $user->update([
            'point' => $user->point + 5,
        ]);

        // Tambah stok buku
        $pustaka = Pustaka::find($peminjaman->pustaka_id);
        $pustaka->update([
            'stok' => $pustaka->stok + 1,
        ]);

        return redirect()->route('pinjam-buku.index')->with('success', 'Pengembalian buku berhasil diverifikasi');
    }

    public function invoice($id)
    {
        $pdf = Pdf::loadView('backend.peminjaman.invoice', [
            'peminjaman' => Peminjaman::with(['user', 'pustaka'])->findOrFail($id),
            'kop_surat' => PengaturanAplikasi::first(),
        ]);

        return $pdf->download('invoice.pdf');
    }
}
