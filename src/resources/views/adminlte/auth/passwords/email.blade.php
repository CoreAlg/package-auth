@extends('vendor.core-auth.adminlte.auth.master', ['page_title' => __('auth.forgot_password.page_title')])
@section('content')

<div class="card-body">
    <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
    <form id="formForgetPassword" action="{{ route('password.email') }}" method="post">
        <div class="form-group">
            <div class="input-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <small id="ve-email" class="validation-error text-danger"></small>
        </div>
        <div class="row">
            <div class="col-12">
                <button id="buttonForgetPassword" type="button" class="btn btn-primary btn-block">Request new password</button>
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