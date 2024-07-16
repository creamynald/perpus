@extends('layouts.app')

@section('content')
    <form class="js-validation-signup" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="block block-themed block-rounded block-fx-shadow">
            <div class="block-header bg-gd-emerald">
                <h3 class="block-title">Data diri</h3>
            </div>
            <div class="block-content">
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    <label class="form-label" for="name">Nama</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    <label class="form-label" for="email">Surel</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Enter your password">
                    <label class="form-label" for="password">Kata Sandi</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                        placeholder="Confirm password">
                    <label class="form-label" for="password-confirm">Ulangi Kata Sandi</label>
                </div>
                <div class="row">
                    <div class="col-sm-6 d-sm-flex align-items-center push">
                        <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="{{ route('login') }}">
                            <i class="fa fa-arrow-left opacity-50 me-1"></i> Login
                        </a>
                    </div>
                    <div class="col-sm-6 text-sm-end push">
                        <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                            Buat Akun
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
