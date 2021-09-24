@extends('emails.master')

@section('body')

    <h2>Hi {{ $name }}!</h2>

    <p>
        Click this link to reset your account password:
        <br>
        <a href="{{ $password_reset_link }}">{{ $password_reset_link }}</a>
    </p>
    
    <p>Enjoy yourself, and welcome to {{ config('app.name') }}.</p>
@endsection