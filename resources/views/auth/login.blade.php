@extends('layouts.app')

@section('content')
<form class="js-validation-signin" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="block block-themed block-rounded block-fx-shadow">
        <div class="block-header bg-gd-dusk text-center">
            <h3 class="block-title">Masuk</h3>
        </div>
        <div class="block-content">
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your username">
                <label class="form-label" for="email">Email</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter your password">
                <label class="form-label" for="password">Kata Sandi</label>
            </div>
            <div class="row">
                <div class="col-sm-6 d-sm-flex align-items-center push">
                    {{-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="remember" name="remember" {{
                            old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div> --}}
                </div>
                <div class="col-sm-6 text-sm-end push">
                    <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
                        Masuk
                    </button>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full bg-body-light text-center d-flex justify-content-between">
            <span class="opacity-50 me-1">Tidak punya akun?</span>
            <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ route('register') }}">
                <i class="fa fa-plus opacity-50 me-1"></i> Daftar
            </a>
        </div>
    </div>
</form>
@endsection