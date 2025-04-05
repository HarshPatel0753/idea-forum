<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin() : View {
        return view('login');
    }

    public function showRegistration() : View {
        return view('registration');
    }

    public function login(Request $request) {
        $validated = $request->validate([
            "email" => 'required|email',
            "password" => 'required|string',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->route( 'dashboard');
        }

        throw ValidationException::withMessages([
        'credentials' => 'Sorry, incorrect credentials'
        ]);
    }

    public function registration(Request $request) {
        $validated = $request->validate([
            "first_name" => 'required|string|max:255',
            "last_name" => 'required|string|max:255',
            "email" => 'required|email|unique:users',
            "password" => 'required|string|min:6|confirmed',
        ]);

        $user = User::create($validated);
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    public function logout() {
        if (Auth::check()) {
            Auth::logout();
            Session()->flush();
            session()->invalidate();
            session()->regenerateToken();
            return redirect()->route('show.login');
        }
        return redirect()->back();
    }
}
