@extends('auth.master', ['page_title' => 'Register', 'page_head' => 'Register'])
@section('content')
<form action="{{ route('register.store') }}" method="POST">
    @csrf
    <div class="form-group mb-2">
        <label for="first_name" class="control-label">First Name</label>
        <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}" placeholder="First Name"/>
        <small class="text-danger">{{ $errors->first('first_name') }}</small>
    </div>

    <div class="form-group mb-2">
        <label for="last_name" class="control-label">Last Name</label>
        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}" placeholder="Last Name"/>
        <small class="text-danger">{{ $errors->first('last_name') }}</small>
    </div>

    <div class="form-group mb-2">
        <label for="gender" class="control-label">Gender</label>
        <select name="gender" class="form-control">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
        <small class="text-danger">{{ $errors->first('gender') }}</small>
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
