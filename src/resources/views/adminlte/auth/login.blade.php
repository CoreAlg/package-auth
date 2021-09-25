@extends('vendor.core-auth.adminlte.auth.master', ['page_title' => __('login.page_title')])
@section('content')

<div class="card-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form id="formSignIn" action="{{ route('authenticate') }}" method="post">
        <div class="form-group">
            <div class="input-group">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <small id="ve-email" class="validation-error text-danger"></small>
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
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button id="buttonSignIn" type="button" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    {{-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
    </div> --}}
    <!-- /.social-auth-links -->

    <p class="mb-1">
        <a href="{{ route('password.email') }}">I forgot my password</a>
    </p>
    <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
    </p>
</div>
  <!-- /.card-body -->
@endsection

@section('scripts')
<script>var HOME = "{{ url(config('home_url', '/')) }}"</script>
<!-- login js -->
<script src="/core-cdn/js/login.js"></script>
@endsection