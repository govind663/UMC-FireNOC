<?php

namespace App\Http\Controllers\Citizen\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Citizen;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function resetPassword($token) {

       return view('citizen.auth.passwords.reset', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:citizens',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required'
        ],[
            'email.exists'=>'This email does not exist in our records.',
            'email.requried'=>'Email Id is required',
            'password.required'=>'Password is required',
            'password.min'=>'The password must be at least 8 characters long',
            'password.confirmed'=>'Confirm Password and Password do not match.',
            'password_confirmation.required' => 'Confirm Password is required',
        ]);

        $updatePassword = DB::table('citizen_password_resets')
                            ->where(['email' => $request->email, 'token' => $request->token])
                            ->first();

        if(!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

          $user = Citizen::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('citizen_password_resets')->where(['email'=> $request->email])->delete();

          return redirect('/citizen/login')->with('message', 'Your password has been changed!');

    }
}
