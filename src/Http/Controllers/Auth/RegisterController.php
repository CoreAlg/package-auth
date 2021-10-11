<?php

namespace CoreAlg\Auth\Http\Controllers\Auth;

use CoreAlg\Auth\Events\NewAccountCreated;
use CoreAlg\Auth\Http\Controllers\Controller;
use CoreAlg\Auth\Models\User;
use CoreAlg\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function __construct()
    {
    }

    public function register(Request $request)
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'first_name' => 'required|max:100',
            'last_name' => 'nullable|max:100',
            'gender' => 'nullable|in:male,female,other',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|max:16',
            'password_confirmation' => 'required|max:12|same:password',
            'agree_terms' => 'required|in:0,1'
        ]);

        $user = User::create([
            'first_name' => $validated_data['first_name'],
            'last_name' => $validated_data['last_name'] ?? null,
            'gender' => $validated_data['gender'] ?? '',
            'email' => $validated_data['email'],
            'password' => bcrypt($validated_data['password']),
            'active' => false,
        ]);

        event(new NewAccountCreated($user));

        $message = Helper::message('Operation Succeed, please check your email to active your account.');
        session()->flash('message', $message);
        return Redirect::back()->exceptInput('password');
    }
}
