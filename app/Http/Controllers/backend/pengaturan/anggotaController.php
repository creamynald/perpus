<?php

namespace App\Http\Controllers\backend\pengaturan;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class anggotaController extends Controller
{
    public function index()
    {
        $anggota = User::role('siswa')->latest()->get();
        return view('backend.pengaturan.anggota.index', compact('anggota'));
    }

    public function create()
    {
        $anggota = new User();
        return view('backend.pengaturan.anggota.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'jenis_kelamin' => 'required',
                'status' => 'required',
                'tempat_lahir' => 'required',
                'no_telp' => 'required',
                'alamat' => 'required',
                'tgl_lahir' => 'required',
                'foto' => 'required|file|max:2048',
                'kelas' => 'required',
            ],
            [
                'name.required' => 'Nama harus diisi',
                'email.required' => 'Email harus diisi',
                'email.email' => 'Email tidak valid',
                'email.unique' => 'Email sudah terdaftar',
                'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
                'status.required' => 'Status harus diisi',
                'tempat_lahir.required' => 'Tempat lahir harus diisi',
                'no_telp.required' => 'No telp harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'tgl_lahir.required' => 'Tanggal lahir harus diisi',
                'foto.required' => 'Foto harus diisi',
                'foto.file' => 'Foto harus berupa file',
                'foto.max' => 'Foto tidak boleh lebih dari 2MB',
                'kelas.required' => 'Kelas harus diisi',
            ],
        );

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move('images/anggota/', $foto);
        } else {
            $foto = null;
        }

        $anggota = new User();
        $anggota->name = $request->name;
        $anggota->email = $request->email;
        $anggota->password = bcrypt('password'); // Set default password
        $anggota->jenis_kelamin = $request->jenis_kelamin;
        $anggota->status = $request->status;
        $anggota->tempat_lahir = $request->tempat_lahir;
        $anggota->no_telp = $request->no_telp;
        $anggota->alamat = $request->alamat;
        $anggota->tgl_lahir = $request->tgl_lahir;
        $anggota->foto = $foto;
        $anggota->kelas = $request->kelas;
        $anggota->save();

        $anggota->assignRole('siswa');

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan');
    }

    public function edit(User $anggota)
    {
        return view('backend.pengaturan.anggota.edit', [
            'anggota' => $anggota,
            'submit' => 'Update',
        ]);
    }
}
