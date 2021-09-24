<?php

namespace CoreAlg\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgetPassword extends Controller
{
    private $template;

    public function __construct()
    {
        $this->template = config('core-auth.view-template', 'default');
    }

    public function email(Request $request)
    {
        return view("vendor.core-auth.{$this->template}.auth.passwords.email");
    }

    public function sendPasswordResetLink(Request $request)
    {
        dd($request->all());
    }
}
