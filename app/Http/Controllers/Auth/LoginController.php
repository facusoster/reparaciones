<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        if ($email === 'admin@techrepair.test' && $password === 'secret123') {
            $request->session()->put('authenticated', true);
            $request->session()->regenerate();

            return redirect()->route('reparaciones.index');
        }

        return back()->withErrors(['email' => 'Las credenciales no son válidas.'])->withInput();
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
