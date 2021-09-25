@extends('vendor.core-auth.adminlte.auth.master', ['page_title' => __('auth.reset_password.page_title') ])
@section('content')
<div class="card-body">
    <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
    <form id="formUpdatePassword" action="{{ route('password.update', $token) }}" method="post">
        <div class="form-group">
            <div class="input-group">
                <input type="email" name="email" disabled value="{{ $email }}" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <small id="ve-password" class="validation-error text-danger"></small>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <small id="ve-password_confirmation" class="validation-error text-danger"></small>
        </div>
        <div class="row">
            <div class="col-12">
                <button id="buttonUpdatePassword" type="button" class="btn btn-primary btn-block">Change password</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <p class="mt-3 mb-1">
        <a href="{{ route('login') }}">Login</a>
    </p>
</div>
@endsection

@section('scripts')
<!-- reset js -->
<script src="/core-cdn/js/reset.js"></script>
@endsection