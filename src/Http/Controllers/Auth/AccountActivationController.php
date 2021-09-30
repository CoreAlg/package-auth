<?php

namespace CoreAlg\Auth\Http\Controllers\Auth;

use CoreAlg\Auth\Http\Controllers\Controller;
use CoreAlg\Auth\Interfaces\HashManagerInterface;
use CoreAlg\Auth\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AccountActivationController extends Controller
{
    private $hashManager;

    public function __construct(HashManagerInterface $hashManager)
    {
        $this->hashManager = $hashManager;
    }

    public function activeAccount(Request $request, string $token)
    {
        $id = $this->hashManager->decrypt($token);

        if (empty($id)) {
            // return view('confirmation', [
            //     'title' => 'Something went wrong',
            //     'body' => 'Something went wrong, please try again.'
            // ]);
        }

        $user = User::find($id);

        if (is_null($user)) {
            return view('confirmation', [
                'title' => 'No User Found',
                'body' => 'Invalid request.'
            ]);
        }

        if (!is_null($user->email_verified_at)) {
            return view('confirmation', [
                'title' => 'Already activated!',
                'body' => 'Your account has already been activated. click <a href="' . route('login') . '">here</a> to login'
            ]);
        }

        Auth::loginUsingId($id);

        User::whereId($id)->update(['email_verified_at' => now()]);

        return Redirect::to(config('redirect_after_active_account', '/home'));
    }
}
