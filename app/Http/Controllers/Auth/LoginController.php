<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! auth()->attempt($request->only('email', 'password'), $request->input('remember'))) {
            return back()->with('status', 'The given credentials are incorrect.');
        }

        return redirect()->intended();
    }
}
