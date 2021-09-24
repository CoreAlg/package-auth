@extends('vendor.core-auth.adminlte.auth.master', ['page_title' => __('auth.forgot_password.page_title')])
@section('content')

<div class="card-body">
    <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
    <form action="{{ route('password.email') }}" method="post">
        <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Request new password</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    <p class="mt-3 mb-1">
      <a href="{{ route('auth.login') }}">Login</a>
    </p>
</div>

    {{-- <div class="login-box-body">
        <p class="login-box-msg">@lang('auth.forgot_password.page_head')</p>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> @lang('messages.success')!</h4>
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="{{ __('auth.forgot_password.placeholder.email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <span class="text-red">{{ $errors->first('email') }}</span>
            </div>
            
            <div class="row">
                <div class="col-xs-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('auth.forgot_password.button_text')</button>
                </div><!-- /.col -->
            </div>
        </form>

        <a href="{{ route('auth.login') }}">@lang('auth.login.link_button_text')</a><br>

    </div><!-- /.login-box-body --> --}}
@endsection