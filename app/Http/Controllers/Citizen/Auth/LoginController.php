<?php

namespace App\Http\Controllers\Citizen\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Citizen_Login_Form()
    {
        if (Auth::guard('citizen')->check()) {
            return redirect('/citizen/dashboard');
        } else {
            return view('citizen.auth.login');
        }

    }

    public function Citizen_Authenticate(Request $request)
    {
        $request->validate([
            'mobile_no' => 'required|numeric|digits:10',
            'password' => 'required|string',
        ],[
           'mobile_no.required' => 'Mobile Number is required',
           'password.required' => 'Password is required',
          ]);

        $credentials = $request->only('mobile_no', 'password');
        // $remember_me = $request->has('remember_token') ? true : false;

        if (auth()->guard('citizen')->attempt($credentials)) {
            return redirect()->intended('/citizen/dashboard')->with('message', 'You are login Successfully.');
        }
        else{
            return redirect('/citizen/login')->with(['Input' => $request->only('email','password'), 'error' => 'Your Mobile Number and Password do not match our records!']);
        }

    }

    public function Citizen_Logout(Request $request) {

        Auth::guard('citizen')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You are logout Successfully.');
    }
}
