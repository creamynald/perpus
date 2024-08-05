@extends('layouts.app')

@section('content')
<form class="js-validation-signup" action="{{ route('register') }}" method="POST">
    @csrf
    <div class="block block-themed block-rounded block-fx-shadow">
        <div class="block-header bg-gd-emerald">
            <h3 class="block-title">Please add your details</h3>
        </div>
        <div class="block-content">
            <div class="form-floating mb-4">
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                <label class="form-label" for="name">Name</label>
            </div>
            <div class="form-floating mb-4">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                <label class="form-label" for="email">Email</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter your password">
                <label class="form-label" for="password">Password</label>
            </div>
            <div class="form-floating mb-4">
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                    placeholder="Confirm password">
                <label class="form-label" for="password-confirm">Confirm Password</label>
            </div>
            <div class="row">
                <div class="col-sm-6 d-sm-flex align-items-center push">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="signup-terms" name="signup-terms" value="1">
                        <label class="form-check-label" for="signup-terms">I agree to Terms</label>
                    </div>
                </div>
                <div class="col-sm-6 text-sm-end push">
                    <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                        Create Account
                    </button>
                </div>
            </div>
        </div>
        <div class="block-content block-content-full bg-body-light d-flex justify-content-between">
            <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="op_auth_signin3.html">
                <i class="fa fa-arrow-left opacity-50 me-1"></i> Sign In
            </a>
            <a class="fs-sm fw-medium link-fx text-muted me-2 mb-1 d-inline-block" href="#" data-bs-toggle="modal"
                data-bs-target="#modal-terms">
                <i class="fa fa-book opacity-50 me-1"></i> Read Terms
            </a>
        </div>
    </div>
</form>
@endsection