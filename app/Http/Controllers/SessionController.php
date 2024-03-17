<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    function index(){
        return view('pages.admin.login');
    }
    function login(Request $request){

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        
        if (Auth::attempt($credentials)) {
            return redirect('admin');
        }else {
            return redirect('/login')->withErrors('Email atau Password salah')->withInput();
        }
    }
    function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
