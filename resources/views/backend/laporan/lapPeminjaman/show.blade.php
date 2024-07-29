@extends('backend.layouts.app')

@section('title', 'Detail Peminjaman')
@section('subTitle', 'Detail Peminjaman')

@section('content')
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <small>@yield('subTitle')</small>
                </h3>
                <div class="block-options">
                    <a href="{{ route('lap-peminjaman.index') }}" class="btn btn-primary">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('lap-peminjaman.pdf', ['tgl_awal' => request('tgl_awal'), 'tgl_akhir' => request('tgl_akhir')]) }}" target="_blank" class="btn btn-primary">
                        <i class="fa fa-file-pdf"></i> Cetak PDF
                    </a>
                </div>
            </div>
            <div class="block-content block-content-full">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode Peminjaman</th>
                                <th class="text-center">Nama Anggota</th>
                                <th class="text-center">Judul Buku</th>
                                <th class="text-center">Tanggal Pinjam</th>
                                <th class="text-center">Tanggal Kembali</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $peminjaman->id }}</td>
                                <td class="text-center">{{ $peminjaman->kode_peminjaman }}</td>
                                <td class="text-center">{{ $peminjaman->user->name }}</td>
                                <td class="text-center">{{ $peminjaman->pustaka->judul_pustaka }}</td>
                                <td class="text-center">{{ $peminjaman->tanggal_pinjam }}</td>
                                <td class="text-center">{{ $peminjaman->tanggal_kembali }}</td>
                                <td class="text-center">{{ $peminjaman->status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection