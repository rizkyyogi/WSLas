<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;


class LoginController extends Controller
{
    public function login()
    {
        if(Auth::check()){
            return redirect('/home');
        }else{
            return view('auth.login');
        }
    }

    public function actlogin(Request $request)
    {
        $data =[
            'email' =>$request->input('email'),
            'password' =>$request->input('password'),
        ];

        if(Auth::Attempt($data)){
            return redirect('/home');
        }else{
            Session::flash('error','Email atau Password is incorrect.');
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
