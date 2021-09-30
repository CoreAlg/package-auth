@extends('auth.master', ['page_title' => 'Forgot Password', 'page_head' => 'Forgot Password'])
@section('content')
<form action="{{ route('password.email') }}" method="POST">
    @csrf

    <div class="form-group mb-2">
        <label for="email" class="control-label">Email Address</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email Address"/>
        <small class="text-danger">{{ $errors->first('email') }}</small>
    </div>

    <button type="submit" class="btn btn-primary">Get Password Reset Link</button>
</form>

<div>
    <a href="{{ route('login') }}">Sign In</a>
</div>
@endsection
