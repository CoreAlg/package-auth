@extends('auth.master', ['page_title' => 'Login', 'page_head' => 'Login'])
@section('content')
<form action="{{ route('authenticate') }}" method="POST">
    @csrf
    <div class="form-group mb-2">
        <label for="email" class="control-label">Email Address</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email Address"/>
        <small class="text-danger">{{ $errors->first('email') }}</small>
    </div>

    <div class="form-group mb-2">
        <label for="password" class="control-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password"/>
        <small class="text-danger">{{ $errors->first('password') }}</small>
    </div>

    <button type="submit" class="btn btn-primary">Log In</button>
</form>

<div>
    <a href="{{ route('register') }}">Sign Up</a>
    &nbsp;|&nbsp;
    <a href="{{ route('password.email') }}">Forgot Password?</a>
</div>
@endsection
