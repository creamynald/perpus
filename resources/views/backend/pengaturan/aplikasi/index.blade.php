@extends('backend.layouts.app')

@section('title', 'Pengaturan')
@section('subTitle', 'Aplikasi')

@section('content')
    <div class="content">
        <h2 class="content-heading">@yield('title')</h2>
        <!-- Dynamic Table Full -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Form @yield('subTitle')</h3>
                <div class="block-options">
                    <a href="#target" class="btn btn-sm btn-primary">
                        <i class="fa fa-save"></i> Simpan
                    </a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('pengaturan.aplikasi.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-4">
                                <label class="form-label" for="nama_aplikasi">Nama Aplikasi</label>
                                <input type="text" class="form-control" id="nama_aplikasi" name="nama_aplikasi"
                                    placeholder="Nama Aplikasi"
                                    value="{{ old('nama_aplikasi', $settings->nama_aplikasi ?? '') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    placeholder="Alamat" value="{{ old('alamat', $settings->alamat ?? '') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    value="{{ old('email', $settings->email ?? '') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="no_telp">Nomor Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp"
                                    placeholder="Nomor Telepon" value="{{ old('no_telp', $settings->no_telp ?? '') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website"
                                    placeholder="Website" value="{{ old('website', $settings->website ?? '') }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-4">
                                <label class="form-label" for="nama_pimpinan">Nama Pimpinan</label>
                                <input type="text" class="form-control" id="nama_pimpinan" name="nama_pimpinan"
                                    placeholder="Nama Pimpinan"
                                    value="{{ old('nama_pimpinan', $settings->nama_pimpinan ?? '') }}">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="logo">Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo">
                                @if ($settings && $settings->logo)
                                    <img src="{{ asset('storage/' . $settings->logo) }}" alt="Logo" class="mt-2"
                                        style="max-width: 150px;">
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END Dynamic Table Full -->
    </div>
@endsection

@push('css')
@endpush

@push('js')
@endpush
