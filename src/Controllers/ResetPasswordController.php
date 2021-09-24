<?php

namespace CoreAlg\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    private $template;

    public function __construct()
    {
        $this->template = config('core-auth.view-template', 'default');
    }

    public function reset(Request $request)
    {
        return view("vendor.core-auth.{$this->template}.auth.passwords.reset");
    }

    public function updatePassword(Request $request)
    {
        dd($request->all());
    }
}
