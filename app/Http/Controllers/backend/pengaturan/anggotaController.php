<?php

namespace App\Http\Controllers\Backend\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class AnggotaController extends Controller
{
    public function index()
    {
        $users = User::role('siswa')->get();
        return view('backend.pengaturan.anggota.index', compact('users'));
    }

    public function create()
    {
        $user = new User();
        return view('backend.pengaturan.anggota.create', compact('user'));
    }

    public function store(Request $request)
    {
        // Validasi request
        $validated = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'jenis_kelamin' => 'required',
                'status' => 'required',
                'tempat_lahir' => 'required',
                'no_telp' => 'required',
                'alamat' => 'required',
                'tgl_lahir' => 'required',
                'foto' => 'required|file|mimes:jpg,jpeg,png|max:2048',
                'kelas' => 'required',
                'password' => 'required|min:6',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
                'status.required' => 'Status harus diisi',
                'tempat_lahir.required' => 'Tempat lahir harus diisi',
                'no_telp.required' => 'No. Telp harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'tgl_lahir.required' => 'Tanggal lahir harus diisi',
                'foto.required' => 'Foto harus diisi',
                'foto.file' => 'Foto harus berupa file',
                'foto.mimes' => 'Foto harus berupa file dengan ekstensi jpg, jpeg, atau png',
                'foto.max' => 'Foto maksimal 2MB',
                'kelas.required' => 'Kelas harus diisi',
                'password.required' => 'Password harus diisi',
                'password.min' => 'Password minimal 6 karakter',
            ],
        );

        // Menangani file upload
        $fotoPath = $request->file('foto')->store('foto');

        // Buat user baru
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'status' => $request->input('status'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'no_telp' => $request->input('no_telp'),
            'alamat' => $request->input('alamat'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'foto' => $fotoPath,
            'kelas' => $request->input('kelas'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Menetapkan peran
        $user->assignRole('siswa');

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('daftar-anggota.index')->with('success', 'Anggota berhasil ditambahkan');
    }

    public function edit(User $daftar_anggotum)
    {
        return view('backend.pengaturan.anggota.edit', [
            'user' => $daftar_anggotum,
            'submit' => 'Update',
        ]);
    }

    public function update(User $daftar_anggotum)
    {
        request()->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $daftar_anggotum->id,
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'tempat_lahir' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
            'kelas' => 'required',
            'password' => 'nullable|min:6',
        ]);

        $daftar_anggotum->update([
            'name' => request('name'),
            'email' => request('email'),
            'jenis_kelamin' => request('jenis_kelamin'),
            'status' => request('status'),
            'tempat_lahir' => request('tempat_lahir'),
            'no_telp' => request('no_telp'),
            'alamat' => request('alamat'),
            'tgl_lahir' => request('tgl_lahir'),
            'kelas' => request('kelas'),
        ]);

        if (request()->hasFile('foto')) {
            Storage::delete($daftar_anggotum->foto);
            $fotoPath = request('foto')->store('foto');
            $daftar_anggotum->update(['foto' => $fotoPath]);
        }

        if (request('password')) {
            $daftar_anggotum->update(['password' => bcrypt(request('password'))]);
        }

        return redirect()->route('daftar-anggota.index')->with('success', 'Anggota berhasil diupdate');
    }

    public function destroy(User $daftar_anggotum)
    {
        Storage::delete($daftar_anggotum->foto);
        $daftar_anggotum->delete();

        return redirect()->route('daftar-anggota.index')->with('success', 'Anggota berhasil dihapus');
    }
}
