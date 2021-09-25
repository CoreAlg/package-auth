<?php

namespace CoreAlg\Auth\Http\Controllers;

use CoreAlg\Auth\Events\NewAccountCreated;
use CoreAlg\Auth\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class RegisterController extends Controller
{
    private $template;

    public function __construct()
    {
        $this->template = config('core-auth.view-template', 'default');
    }

    public function register(Request $request)
    {
        return view("vendor.core-auth.{$this->template}.auth.register");
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|max:16',
            'password_confirmation' => 'required|max:12|same:password',
            'agree_terms' => 'required|in:0,1'
        ]);

        $user = User::create([
            'name' => $validated_data['name'],
            'email' => $validated_data['email'],
            'password' => bcrypt($validated_data['password']),
        ]);

        event(new NewAccountCreated($user));

        return response()->json([
            'status' => 'success',
            'message' => 'Operation Succeed, please check your email to active your account.'
        ]);
    }
}
