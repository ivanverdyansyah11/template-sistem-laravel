<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('login.index', [
            'title' => 'Login',
        ]);
    }

    public function register()
    {
        return view('register.index', [
            'title' => 'Register',
        ]);
    }
}
