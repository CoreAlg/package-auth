@extends('vendor.core-auth.adminlte.auth.master', ['page_title' => __('login.page_title')])
@section('content')

<div class="card-body">
    <p class="login-box-msg">Register a new membership</p>

    <form id="formRegister" action="{{ route('register.store') }}" method="post">
        <div class="form-group">
            <div class="input-group">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Full name">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <small id="ve-name" class="text-danger validation-error"></small>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <small id="ve-email" class="text-danger validation-error"></small>
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
            <small id="ve-password" class="text-danger validation-error"></small>
        </div>
        <div class="form-group">
            <div class="input-group">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <small id="ve-password_confirmation" class="text-danger validation-error"></small>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="agreeTerms" name="agree_terms" value="1">
                    <label for="agreeTerms">
                    I agree to the <a href="#">terms</a>
                    </label>
                </div>
                <small id="ve-agree_terms" class="text-danger validation-error"></small>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button id="buttonRegister" type="button" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    {{-- <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i>
            Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i>
            Sign up using Google+
        </a>
    </div> --}}

    <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
</div>
@endsection

@section('scripts')
<!-- register js -->
<script src="/core-cdn/js/register.js"></script>
@endsection