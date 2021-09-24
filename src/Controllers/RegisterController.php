<?php

namespace CoreAlg\Auth\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        dd($request->all());
    }
}
