<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RootController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/', [RootController::class,'index']);

Route::get('/recipe', function () {
    
    // Check if user has logged in. If just a guest, link to the login page.
    if (!Auth::check()) {
        return redirect()->intended('/login');
    }
    $queryParam = [
        'search' => request('search')
    ];

    $response = Http::get('http://localhost:8080/api/recipe', $queryParam);

    if ($response->successful()) {
        $recipe = $response->json();
        return view('root', compact('recipe'));
    } else {
        return response()->json(['error' => 'Failed to fetch recipe data'], 500);
    }

});

Route::get('/api/auth/redirect/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/api/auth/callback/google', [AuthController::class, 'googleLogin']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');