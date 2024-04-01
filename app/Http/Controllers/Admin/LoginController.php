<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function loginAttempt(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if(!auth('admin')->attempt($request->only('email','password'))){
            return redirect()->back()->withErrors('Invalid Email or Password');
        }


        return redirect()->route('admin.dashboard');
    }

}
