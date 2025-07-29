<?php

namespace App\Http\Controllers\Auth;

use App\Support\Meta;
use Illuminate\View\View;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function login(): View
    {
        $meta = new Meta();
        $meta->title = 'Login';
        return view('auth.login', compact('meta'));
    }

    public function store(): View
    {
        return view('auth.');
    }
}
