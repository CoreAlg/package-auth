@extends('auth.master', ['page_title' => __('login.page_title')])
@section('content')
    {{-- <div class="login-box-body">
        <p class="login-box-msg">@lang('login.page_head')</p>

        @if (session('status'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> @lang('messages.success')!</h4>
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('authenticate') }}" method="post">
            @csrf
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="{{ __('login.placeholder.email') }}">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <span class="text-red">{{ $errors->first('email') }}</span>
            </div>
            
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="{{ __('login.placeholder.password') }}">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <span class="text-red">{{ $errors->first('password') }}</span>
            </div>
            
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> @lang('login.remember_me')
                        </label>
                    </div>
                </div><!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('login.button_text')</button>
                </div><!-- /.col -->
            </div>
        </form>

        <a href="{{ route('password.email') }}">@lang('auth.forgot_password.link_button_text')</a><br>

    </div><!-- /.login-box-body --> --}}

    <main class="form-signin">
        <form id="formSignIn" action="{{ route('authenticate') }}" method="post">
            <img class="mb-4" src="https://getbootstrap.com/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-group">
                <label class="control-label" for="email">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="name@example.com">
                <span id="ve-email" class="text-red">{{ $errors->first('email') }}</span>                
            </div>

            <div class="form-floating">

            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <label for="password">Password</label>
                <span id="password" class="text-red">{{ $errors->first('password') }}</span>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" name="remember" value="1"> Remember me
                </label>
            </div>
            <button id="buttonSignIn" class="w-100 btn btn-lg btn-primary" type="button">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </main> 
@endsection

@section('scripts')
    <script src="/core-cdn/js/login.js"></script>
@endsection