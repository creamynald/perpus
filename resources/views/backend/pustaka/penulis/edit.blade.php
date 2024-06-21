@extends('backend.layouts.app')

@section('title', 'Pustaka')
@section('subTitle', 'Penulis')

@section('content')
<div class="content">
    <h2 class="content-heading">@yield('title')</h2>
    <!-- Dynamic Table Full -->
    <form action="{{ route('penulis.update', $penulis) }}" method="POST">
        @csrf
        @method('PUT')
        @include('backend.pustaka.penulis.partials.form-control')
    </form>
    <!-- END Dynamic Table Full -->
</div>
@endsection