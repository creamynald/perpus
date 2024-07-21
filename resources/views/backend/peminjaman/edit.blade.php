@extends('backend.layouts.app')

@section('title', 'Peminjaman')
@section('subTitle', 'Pinjam Buku')

@section('content')
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        <!-- Dynamic Table Full -->
        <form action="{{ route('pinjam-buku.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('backend.peminjaman.partials.form-control', ['submit' => 'Update'])
        </form>
        <!-- END Dynamic Table Full -->
    </div>
@endsection
