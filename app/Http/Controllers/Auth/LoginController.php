<?php

namespace App\Http\Controllers\Auth;
use App\Http\Requests\LoginRequest;
use App\Support\Meta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function login(): View
    {
        $meta = new Meta();
        $meta->metaTitle = 'Login';
        return view('auth.login', compact('meta'));
    }

    public function store(LoginRequest $request): RedirectResponse
    {

        if (Auth::attempt($request->validatedCredentials(), $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
