@extends('auth.master', ['page_title' => 'Register', 'page_head' => 'Register'])
@section('content')
<form action="{{ route('register.store') }}" method="POST">
    @csrf
    <div class="form-group mb-2">
        <label for="name" class="control-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name"/>
        <small class="text-danger">{{ $errors->first('name') }}</small>
    </div>

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

    <div class="form-group mb-2">
        <label for="password_confirmation" class="control-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password"/>
        <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
    </div>

    <div class="form-group mb-2">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" name="agree_terms">
            <label class="form-check-label" for="agree_terms">
                Agree Terms&#39;Conditions
            </label>
        </div>
        <small class="text-danger">{{ $errors->first('agree_terms') }}</small>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<div>
    <a href="{{ route('login') }}">Sign In</a>
</div>
@endsection
