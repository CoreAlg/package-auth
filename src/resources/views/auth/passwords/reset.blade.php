@extends('auth.master', ['page_title' => __('auth.reset_password.page_title') ])
@section('content')
    <div class="login-box-body">
        <p class="login-box-msg">@lang('auth.reset_password.page_head')</p>

        <form action="{{ route('password.update', $token) }}" method="post">
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

        <a href="{{ route('login') }}">@lang('login.link_button_text')</a><br>

    </div><!-- /.login-box-body -->
@endsection