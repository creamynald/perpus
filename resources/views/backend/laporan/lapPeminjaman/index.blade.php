@extends('backend.layouts.app')

@section('title', 'Laporan')
@section('subTitle', 'Laporan Peminjaman')

@section('content')
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <small>@yield('subTitle')</small>
                </h3>
                <div class="block-options">
                    <form action="{{ route('lap-peminjaman.index') }}" method="get">
                        <div class="input-group">
                            <input type="date" class="form-control" name="tgl_awal" value="{{ request('tgl_awal') }}">
                            <input type="date" class="form-control" name="tgl_akhir" value="{{ request('tgl_akhir') }}">
                            <button type="submit" class="btn btn-sm btn-primary">
                                <i class="fa fa-search opacity-50"></i> Tampilkan
                            </button>
                        </div>
                    </form>
                </div>
                <div class="block-options">
                    <a href="{{ route('lap-peminjaman.pdf', ['tgl_awal' => request('tgl_awal'), 'tgl_akhir' => request('tgl_akhir')]) }}" target="_blank" class="btn btn-primary">
                        <i class="fa fa-file-pdf"></i> Cetak PDF
                    </a>
                </div>
            </div>
        </div>
        @if($peminjaman->isNotEmpty())
            <div class="block-content block-content-full">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
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
                            @foreach($peminjaman as $key => $row)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $row->kode_peminjaman }}</td>
                                    <td class="text-center">{{ $row->user->name }}</td>
                                    <td class="text-center">{{ $row->pustaka->judul_pustaka }}</td>
                                    <td class="text-center">{{ $row->tanggal_pinjam }}</td>
                                    <td class="text-center">{{ $row->tanggal_kembali }}</td>
                                    <td class="text-center">{{ $row->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="block-content block-content-full">
                <div class="alert alert-warning" role="alert">
                    Tidak ada data untuk ditampilkan. Silakan terapkan filter untuk melihat data.
                </div>
            </div>
        @endif
        <!-- END Dynamic Table Full -->
    </div>
@endsection