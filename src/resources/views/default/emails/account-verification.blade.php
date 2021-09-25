@extends('vendor.core-auth.default.emails.master')

@section('body')

    <h2>Hi {{ $data['name'] }}!</h2>
    <strong>We're delighted to have you on board</strong>

    <p>
        Click this link to active your account:
        <br>
        <a href="{{ $data['activation_link'] }}">{{ $data['activation_link'] }}</a>
    </p>
    
    <p>Enjoy yourself, and welcome to {{ config('app.name') }}.</p>
@endsection