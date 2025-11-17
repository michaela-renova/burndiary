<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{

     public function register(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8', 'max:20'],
        ], [
            'name.required' => "Jméno je povinné.",
            'name.min' => "Jméno je příliš krátké.",
            'email.required' => "Email je povinný.",
            'password.required' => "Heslo je povinné.",
            'password.min' => "Heslo je příliš krátké.",
            'password.max' => "Heslo je příliš dlouhé.",
        ])->validateWithBag('register');

        
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

       
        Auth::login($user);
        $request->session()->regenerate();
        return redirect()->intended('/');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'Neplatné přihlašovací údaje.',
        ])->onlyInput('email');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    
    public function logout(Request $request): RedirectResponse
    {
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
    }

 
}


