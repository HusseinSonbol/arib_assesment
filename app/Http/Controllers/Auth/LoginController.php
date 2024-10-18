<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $login = $request->input('login');
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [
            $field => $login,
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        }

        return redirect()->back()->withErrors([
            'login' => 'The provided credentials are incorrect.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('home');
    }


}
