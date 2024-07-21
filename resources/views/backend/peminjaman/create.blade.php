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