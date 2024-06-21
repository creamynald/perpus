@extends('backend.layouts.app')

@section('title', 'Pustaka')
@section('subTitle', 'Penulis')

@section('content')
<div class="content">
    <h2 class="content-heading">@yield('title')</h2>
    <!-- Dynamic Table Full -->
    <form action="{{ route('penulis.store') }}" method="POST">
        @csrf
        @include('backend.pustaka.penulis.partials.form-control', ['submit' => 'Tambah'])
    </form>
    <!-- END Dynamic Table Full -->
</div>
@endsection