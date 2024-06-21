@extends('backend.layouts.app')

@section('title', 'Pustaka')
@section('subTitle', 'Kategori')

@section('content')
<div class="content">
    <h2 class="content-heading">@yield('title')</h2>
    <!-- Dynamic Table Full -->
    <form action="{{ route('kategori.update', $kategori) }}" method="POST">
        @csrf
        @method('PUT')
        @include('backend.pustaka.kategori.partials.form-control')
    </form>
    <!-- END Dynamic Table Full -->
</div>
@endsection