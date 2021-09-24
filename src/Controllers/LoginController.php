<?php

namespace CoreAlg\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $template;

    public function __construct()
    {
        $this->template = config('core-auth.view-template', 'default');
    }

    public function login(Request $request)
    {
        return view("vendor.core-auth.{$this->template}.auth.login");
    }

    public function authenticate(Request $request)
    {
        dd($request->all());
    }

    public function logout(Request $request)
    {
    }
}
