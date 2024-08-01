@extends('backend.layouts.app')

@section('title', 'Pengaturan')
@section('subTitle', 'Anggota')

@section('content')
<div class="content">
    <h2 class="content-heading">@yield('title')</h2>
    <!-- Dynamic Table Full -->
    <form action="{{ route('daftar-anggota.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('backend.pengaturan.anggota.partials.form-control', ['submit' => 'Create'])
    </form>    
    <!-- END Dynamic Table Full -->
</div>
@endsection