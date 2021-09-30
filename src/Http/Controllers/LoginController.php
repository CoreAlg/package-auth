<?php

namespace CoreAlg\Auth\Http\Controllers;

use CoreAlg\Auth\Services\AuthService;
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

        return response()->json($response);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return Redirect::to(route('login'));
    }
}
