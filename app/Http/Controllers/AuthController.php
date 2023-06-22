<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function showLoginForm(): View {
        
        return view('pages.auth.login');
    }

    public function login() {

    }

    public function showRegisterForm(): View {

        return view('pages.auth.register');
    }

    public function register() {

    }

    public function logout() {

    }
}
