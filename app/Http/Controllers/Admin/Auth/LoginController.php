<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Repository\LogRepository;

class LoginController extends Controller
{
    protected $logRepository;

    public function __construct(LogRepository $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    public function login()
    {
        if (Auth::guard('web')->check()) {
            return redirect('/admin/dashboard');
        } else {
            return view('admin.auth.login');
        }

    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|string',
        ],[
           'email.required' => 'Email Id is required',
           'password.required' => 'Password is required',
          ]);

        $credentials = $request->only('email', 'password');
        // $remember_me = $request->has('remember_token') ? true : false;

        if (Auth::attempt($credentials)) {
            // $roles = auth()->user()->role;
            $this->logRepository->insertLog(Auth::guard('web')->user()->id, 'users', 'login');

            return redirect()->route('admin.dashboard')->with('message', 'You are login Successfully.');
        }
        else{
            return redirect()->route('admin.login')->with(['Input' => $request->only('email','password'), 'error' => 'Your Email id and Password do not match our records!']);
        }

    }

    public function logout() {
        $this->logRepository->insertLog(Auth::guard('web')->user()->id, 'users', 'logout');
        Session::flush();
        Auth::logout();

        return redirect()->route('admin.login')->with('message', 'You are logout Successfully.');
    }
}
