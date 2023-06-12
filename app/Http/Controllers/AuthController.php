<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function logoin()
    {
        return  view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));
        }
        return back()->withErrors([
            'email' => 'Identifiants incorrect'
        ])->onlyInput('email');
    }
    public function logout()
    {
        Auth::logout();
        return to_route('login')->with('success', 'Vous êtes déconnecté');
    }
}
