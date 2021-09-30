<?php

namespace CoreAlg\Auth\Http\Controllers;

use CoreAlg\Auth\Interfaces\HashManagerInterface;
use CoreAlg\Auth\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ResetPasswordController extends Controller
{
    private $hashManager;

    public function __construct(HashManagerInterface $hashManager)
    {
        $this->hashManager = $hashManager;
    }

    public function reset(Request $request, string $token)
    {
        $data = $this->hashManager->decrypt($token);

        $user = json_decode($data);
        $email = $user->email;

        return view("auth.passwords.reset", compact(['token', 'email']));
    }

    public function updatePassword(Request $request, string $token)
    {
        $data = $this->hashManager->decrypt($token);

        $user = json_decode($data);

        $validated_data = $request->validate([
            'password' => 'required|max:16',
            'password_confirmation' => 'required|max:12|same:password',
        ]);

        User::whereId($user->id)->update([
            'password' => bcrypt($validated_data['password'])
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Your password has been successfully updated.'
        ]);
    }
}
