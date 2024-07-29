@extends('backend.layouts.app')

@section('title', 'Laporan')
@section('subTitle', 'Laporan Pustaka')

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
                    <a href="{{ route('lap-pustaka.pdf', ['kategori' => request('kategori')]) }}" target="_blank" class="btn btn-primary">
                        <i class="fa fa-file-pdf"></i> Cetak PDF
                    </a>
                </div>
            </div>
        </div>
        @if($pustaka->isNotEmpty())
            <div class="block-content block-content-full">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Penulis</th>
                                <th class="text-center">Penerbit</th>
                                <th class="text-center">Jumlah Stok</th>
                                <th class="text-center">Posisi/Rak</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pustaka as $key => $row)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $row->kode_pustaka }}</td>
                                    <td class="text-center">{{ $row->judul_pustaka }}</td>
                                    <td class="text-center">{{ $row->kategori->nama_kategori_pustaka }}</td>
                                    <td class="text-center">{{ $row->penulis->nama_penulis }}</td>
                                    <td class="text-center">{{ $row->penerbit->nama_penerbit }}</td>
                                    <td class="text-center">{{ $row->stok }}</td>
                                    <td class="text-center">{{ $row->rak }}</td>
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

@push('css')
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css') }}">
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
