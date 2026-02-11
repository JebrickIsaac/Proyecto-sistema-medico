<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm() {
        return view('auth.login');
    }

    public function login(Request $request) {
        if ($request->email == 'medico@clinica.com' && $request->password == '123456') {
            session(['medico' => true]);
            return redirect('/');
        }
        return back()->with('error', 'Credenciales incorrectas');
    }

    public function logout() {
        session()->forget('medico');
        return redirect('/login');
    }
}
