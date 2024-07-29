<?php

namespace App\Http\Controllers\backend\pengaturan;

use App\Http\Controllers\Controller;
use App\Models\PengaturanAplikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class pengaturanAplikasiController extends Controller
{
    public function index()
    {
        return view('backend.pengaturan.aplikasi.index', [
            'settings' => PengaturanAplikasi::first(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_aplikasi' => 'required|string|max:255',
            'nama_pimpinan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telp' => 'required|string|max:20',
            'website' => 'required|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $settings = PengaturanAplikasi::first();

        if (!$settings) {
            $settings = new PengaturanAplikasi();
        }

        $settings->nama_aplikasi = $request->input('nama_aplikasi');
        $settings->nama_pimpinan = $request->input('nama_pimpinan');
        $settings->alamat = $request->input('alamat');
        $settings->email = $request->input('email');
        $settings->no_telp = $request->input('no_telp');
        $settings->website = $request->input('website');

        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($settings->logo && file_exists(public_path('img/logo/' . $settings->logo))) {
                unlink(public_path('img/logo/' . $settings->logo));
            }

            // Simpan file logo baru
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/logo'), $filename);
            $settings->logo = $filename;
        }

        $settings->save();

        return redirect()->route('pengaturan.aplikasi')->with('success', 'Pengaturan berhasil disimpan.');
    }
}
