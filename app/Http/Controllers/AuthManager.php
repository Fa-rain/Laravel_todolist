<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;
use Symfony\Component\Routing\Route;

class AuthManager extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $credentials = $request->only('username', 'password');

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('todolist'));
        }
        return redirect('login')->with('error', 'Invalid email or password');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        $user = New User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;

        // Left side is based from database
        // and right side is based from name of an input

        if($user->save())
        {
            return redirect(route('login'))
            ->with('success', 'Registration successful');
        }
        return redirect(route('register'))
        ->with('error', 'Registration failed');
    }
}
