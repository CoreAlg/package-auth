@extends('vendor.core-auth.adminlte.auth.master', ['page_title' => __('auth.reset_password.page_title') ])
@section('content')
<div class="card-body">
    <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>
    <form action="{{ route('password.update') }}" method="post">
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Confirm Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Change password</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <p class="mt-3 mb-1">
        <a href="{{ route('auth.login') }}">Login</a>
    </p>
</div>
    {{-- <div class="login-box-body">
        <p class="login-box-msg">@lang('auth.reset_password.page_head')</p>

        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" value="{{ request()->input('email') }}" class="form-control" placeholder="{{ __('auth.reset_password.placeholder.email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <span class="text-red">{{ $errors->first('email') }}</span>
            </div>
            
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="{{ __('auth.reset_password.placeholder.password') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span class="text-red">{{ $errors->first('password') }}</span>
            </div>

            <div class="form-group has-feedback">
                <input type="password" name="password_confirmation" class="form-control" placeholder="{{ __('auth.reset_password.placeholder.password_confirmation') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span class="text-red">{{ $errors->first('password_confirmation') }}</span>
            </div>

            <input type="hidden" name="token" value="{{ request()->route('token') }}">
            
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('auth.reset_password.button_text')</button>
                </div><!-- /.col -->
            </div>
        </form>

        <a href="{{ route('auth.login') }}">@lang('auth.login.link_button_text')</a><br>

    </div><!-- /.login-box-body --> --}}
@endsection