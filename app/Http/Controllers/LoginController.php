<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], ['email.required' => 'Email tidak boleh kosong', 'password.required' => 'Password tidak boleh kosong']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            LogActivity::create(['email' => $request['email'], 'method' => 'POST', 'url' => $request->path()]);

            return redirect()->intended('/');
        }

        return back()->with(
            'loginError',
            'Email atau Password salah!!',
        );
    }

    public function logout(Request $request)
    {
        LogActivity::create(['email' => auth()->user()->email, 'method' => 'POST', 'url' => request()->path()]);
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
