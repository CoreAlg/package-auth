@extends('vendor.core-auth.adminlte.auth.master', ['page_title' => __('auth.login.page_title')])
@section('content')
    <div class="login-box-body">
        <p class="login-box-msg">@lang('auth.login.page_head')</p>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> @lang('messages.success')!</h4>
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('register.store') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="{{ __('auth.login.placeholder.email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <span class="text-red">{{ $errors->first('email') }}</span>
            </div>
            
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="{{ __('auth.login.placeholder.password') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span class="text-red">{{ $errors->first('password') }}</span>
            </div>
            
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> @lang('auth.login.remember_me')
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('auth.login.button_text')</button>
                </div><!-- /.col -->
            </div>
        </form>

        <a href="{{ route('password.email') }}">@lang('auth.forgot_password.link_button_text')</a><br>

    </div><!-- /.login-box-body -->
@endsection