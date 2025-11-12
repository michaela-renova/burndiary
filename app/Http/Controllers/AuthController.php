<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request){
        $userInfo = $request->validate([
            'name' => ['required', 'min:2'],
            'email' => ['required', 'max:255', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:15'],
        ], [
            'name.min' => "Jméno je příliš krátké.",
            'email.required' => "Email je povinný.",
            'password.required' => "Heslo je povinné.",
            'password.min' => "Heslo je příliš krátké.",
            'password.max' => "Heslo je příliš dlouhé.",
        ]);

        $userInfo['password'] = bcrypt($userInfo['password']);
        $user = User::create($userInfo);
        auth()->login($user);
        return redirect('/');

    }

    public function login(Request $request){
        $userInfo = $request->validate([
        'email' => ['required', 'email'],
        'password' => 'required'
        ]);

        if(auth()->attempt(['email' =>$userInfo['email'], 'password'=>$userInfo['password']])) {
            $request->session()->regenerate();
        
        return redirect('/');
        } else {
            return back()->withErrors([
                'password' => "Neplatné přihlašovací údaje."
        ]);
        }

    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        //$request->session()->regenerate(); ??
        return redirect('/');
    }
}
