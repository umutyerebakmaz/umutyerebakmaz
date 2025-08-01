<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\Support\Meta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(): View
    {
        $meta = new Meta();
        return view('auth.register', compact('meta'));
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        Auth::login($user);
        return redirect()->route('home')->with('success', 'Register Completed!');
    }
}
