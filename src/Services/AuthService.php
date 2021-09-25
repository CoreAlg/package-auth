<?php

namespace CoreAlg\Auth\Services;

use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function __construct()
    {
    }

    public function authenticate(array $data)
    {
        $attempt = Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        if (!$attempt) {
            return [
                'status' => 'error',
                'message' => 'Invalid email or password.',
                'data' => null,
            ];
        }

        $user = auth()->user();

        if (is_null($user->email_verified_at)) {
            Auth::logout();
            return [
                'status' => 'error',
                'message' => 'Your account is not active, please contact support.',
                'data' => null,
            ];
        }

        return [
            'status' => 'success',
            'message' => '',
            'data' => $user,
        ];
    }
}
