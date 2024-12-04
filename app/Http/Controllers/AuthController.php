<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        //dd(Hash::make(123456));
        if (!empty(Auth::check())) {
            return redirect('admin/dashboard');
        }
        return view('auth.login');
    }

    public function Authlogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $user_type = Auth::user()->user_type;
            if ($user_type == 0) {
                return redirect('admin/dashboard');
            } elseif ($user_type == 1) {
                return redirect('teacher/dashboard');
            } else {
                return redirect('parent/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Correo y/o contrasena incorrectos');
        }
    }

    public function Authlogout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
