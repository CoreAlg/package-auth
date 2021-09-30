@extends('emails.master')

@section('body')

    <h2>Hi {{ $user->name }}!</h2>
    <strong>We're delighted to have you on board</strong>

    <p>
        Click this link to active your account:
        <br>
        <a href="{{ $activation_link }}">{{ $activation_link }}</a>
    </p>
    
    <p>Enjoy yourself, and welcome to {{ config('app.name') }}.</p>
@endsection