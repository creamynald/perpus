@extends('backend.layouts.app')

@section('title', 'Peminjaman')
@section('subTitle', 'Pinjam Buku')

@section('content')
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        <!-- Dynamic Table Full -->
        <form action="{{ route('pinjam-buku.store') }}" method="POST">
            @csrf
            @include('backend.peminjaman.partials.form-control', ['submit' => 'Tambah'])
        </form>
        <!-- END Dynamic Table Full -->
    </div>
@endsection

@push('js')
    <script>
        document.getElementById('tanggal_pinjam').addEventListener('change', function() {
            var tanggalPinjam = new Date(this.value);
            if (isNaN(tanggalPinjam.getTime())) return;

            var tanggalKembali = new Date(tanggalPinjam);
            tanggalKembali.setDate(tanggalPinjam.getDate() + 7);

            // Set the max date for tanggal_kembali
            var maxDay = ("0" + tanggalKembali.getDate()).slice(-2);
            var maxMonth = ("0" + (tanggalKembali.getMonth() + 1)).slice(-2);
            var maxYear = tanggalKembali.getFullYear();

            var maxDate = maxYear + '-' + maxMonth + '-' + maxDay;
            document.getElementById('tanggal_kembali').setAttribute('max', maxDate);

            // Automatically set tanggal_kembali to the maxDate
            document.getElementById('tanggal_kembali').value = maxDate;
        });
    </script>
@endpush
