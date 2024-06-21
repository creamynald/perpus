@extends('backend.layouts.app')

@section('title', 'Pustaka')
@section('subTitle', 'Penerbit')

@section('content')
<div class="content">
    <h2 class="content-heading">@yield('title')</h2>
    <!-- Dynamic Table Full -->
    <form action="{{ route('penerbit.update', $penerbit) }}" method="POST">
        @csrf
        @method('PUT')
        @include('backend.pustaka.penerbit.partials.form-control')
    </form>
    <!-- END Dynamic Table Full -->
</div>
@endsection