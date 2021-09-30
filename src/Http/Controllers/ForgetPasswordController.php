<?php

namespace CoreAlg\Auth\Http\Controllers;

use CoreAlg\Auth\Interfaces\HashManagerInterface;
use CoreAlg\Auth\Mail\SendPasswordResetLink;
use CoreAlg\Auth\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    private $hashManager;

    public function __construct(HashManagerInterface $hashManager)
    {
        $this->hashManager = $hashManager;
    }

    public function email(Request $request)
    {
        return view("auth.passwords.email");
    }

    public function sendPasswordResetLink(Request $request)
    {
        $validated_data = $request->validate([
            'email' => 'required|email|max:50|exists:users',
        ]);

        $user = User::whereEmail($validated_data['email'])->first();

        $token = $this->hashManager->encrypt(json_encode([
            'id' => $user->id,
            'email' => $user->email,
        ]));

        $password_reset_link = route('password.reset', $token);

        Mail::to($user)->send(new SendPasswordResetLink($user, $password_reset_link));

        return response()->json([
            'status' => 'success',
            'message' => "A password reset link has been sent to your registered email."
        ]);
    }
}
