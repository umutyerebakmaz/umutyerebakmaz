<?php

namespace App\Http\Controllers\Auth;

use App\Support\Meta;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;


class RegisterController extends Controller
{
    public function register(): View
    {
        $meta = new Meta();
        return view('auth.register', compact('meta'));
    }

    public function store(): RedirectResponse
    {
        return redirect()
            ->to(url()->previous())
            ->with('success', 'Register Completed!');
    }
}
