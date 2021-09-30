<?php

namespace CoreAlg\Auth\Http\Controllers;

use CoreAlg\Auth\Services\AuthService;
use CoreAlg\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        return view("auth.login");
    }

    public function authenticate(Request $request)
    {
        $validated_data = $request->validate([
            'email' => 'required|email|max:50',
            'password' => 'required|max:16',
            'remember' => 'nullable|in:0,1'
        ]);

        $response = $this->authService->authenticate($validated_data);

        if ($response['status'] !== 'success') {
            $message = Helper::message($response['message'], $response['status']);
            session()->flash('message', $message);
            return Redirect::back()->exceptInput('password');
        }

        return Redirect::to('/home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $message = Helper::message('You have successfully logged out.');
        session()->flash('message', $message);
        return Redirect::to(route('login'));
    }
}
