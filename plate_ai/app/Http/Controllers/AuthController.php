<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    /**
     * Direct to login form page.
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Login
     */
    public function googleLogin()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate([
            'email' => $googleUser->email
        ], [
            'email' => $googleUser->email,
            'name' => $googleUser->name,
            'password' => 'testpassword',
            'avatar' => $googleUser->avatar,
        ]);

        Auth::login($user);
        return redirect()->intended('/');
    }

    /**
     * Direct to register form page.
     */
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $user = User::firstOrCreate([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'avatar' => "https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp"
        ]);

        Auth::login($user);

        return redirect()->intended("/");
    }

    public function login(Request $request)
    {
        $user = User::first([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->intended('/');
    }

    /** Logout */
    public function logout()
    {
        Auth::logout();

        return redirect()->intended('/');
    }
}
