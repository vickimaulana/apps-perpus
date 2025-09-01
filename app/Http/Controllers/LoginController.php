<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){

        return view('login');
    }

    public function actionLogin(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required|min:8',
        ]);
        //jika user ditemukan / berhasil login
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->intended('/dashboard')->with('succes', 'login berhasil');
        }
        // jika gagal
        return back()->withErrors(['email' => 'Email atau password salah'])->onlyInput('email');
    }


}
