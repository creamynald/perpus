@extends('backend.layouts.app')

@section('title', 'Peminjaman')
@section('subTitle', 'Pinjam Buku')

@section('content')
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    <small>Table @yield('subTitle')</small>
                </h3>

                @role(['admin', 'super admin'])
                    <a href="{{ route('pinjam-buku.create') }}" type="button" class="btn-block-option">
                        <i class="si si-plus"></i> Tambah
                    </a>
                    @elserole('siswa')
                    <a href="{{ route('pinjam-buku.create') }}" type="button" class="btn-block-option">
                        <i class="si si-plus"></i> Pinjam Buku
                    </a>
                @endrole
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full class in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Kode</th>
                            <th>Tanggal</th>
                            <th>Nama Anggota</th>
                            <th>Kelas</th>
                            <th>Judul Pustaka</th>
                            <th>Jumlah</th>
                            <th>Kategori</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPeminjaman as $index => $row)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $row->kode_peminjaman }}</td>
                                <td>{{ $row->tanggal_pinjam }}</td>
                                <td>{{ $row->user->name }}</td>
                                <td>{{ $row->user->kelas }}</td>
                                <td>
                                    {{ $row->pustaka->judul_pustaka }}
                                </td>
                                <td>1 Pustaka</td>
                                <td>{{ $row->pustaka->kategori->nama_kategori_pustaka }}</td>
                                <td class="text-center">
                                    @if ($row->status == 'diajukan')
                                        <span class="badge bg-warning">Diajukan</span>
                                    @elseif($row->status == 'dipinjam')
                                        <span class="badge bg-success">Dipinjam</span>
                                    @elseif($row->status == 'dikembalikan')
                                        <span class="badge bg-success">Dikembalikan</span>
                                    @else
                                        <span class="badge bg-danger">Dibatalkan</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @role(['admin', 'super admin'])
                                        @if ($row->status == 'diajukan')
                                            <form action="{{ route('pinjam-buku.verifikasi', $row->id) }}" method="POST"
                                                style="display: inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="fa fa-check"></i>
                                                </button>
                                            </form>
                                        @elseif ($row->status == 'dipinjam')
                                            <form action="{{ route('pinjam-buku.verifikasi-pengembalian', $row->id) }}"
                                                method="POST" style="display: inline">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-undo"></i>
                                                </button>
                                            </form>
                                        @endif
                                    @endrole
                                    <a href="{{ route('pinjam-buku.edit', $row->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('pinjam-buku.invoice', $row->id) }}" class="btn btn-sm btn-info">
                                        <i class="fa fa-print"></i>
                                    </a>                                    
                                </td>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
@endsection

@push('css')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
@endpush

@push('js')
    <!-- jQuery (required for DataTables plugin) -->
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables-buttons/buttons.html5.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
@endpush
