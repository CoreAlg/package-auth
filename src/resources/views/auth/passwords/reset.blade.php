@extends('auth.master', ['page_title' => 'Reset Password', 'page_head' => 'Reset Password'])
@section('content')
<form action="{{ route('password.update', $token) }}" method="POST">
    @csrf

    <div class="form-group mb-2">
        <label for="email" class="control-label">Email Address</label>
        <input type="email" name="email" class="form-control" disabled value="{{ $email }}" placeholder="Email Address"/>
        <small class="text-danger">{{ $errors->first('email') }}</small>
    </div>

    <div class="form-group mb-2">
        <label for="password" class="control-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password"/>
        <small class="text-danger">{{ $errors->first('password') }}</small>
    </div>

    <div class="form-group mb-2">
        <label for="password_confirmation" class="control-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password"/>
        <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
    </div>

    <button type="submit" class="btn btn-primary">Reset Password</button>
</form>

<div>
    <a href="{{ route('login') }}">Sign In</a>
</div>
@endsection
