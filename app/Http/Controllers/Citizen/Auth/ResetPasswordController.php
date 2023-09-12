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
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',

        ]);

        $updatePassword = DB::table('citizen_password_resets')
                            ->where(['email' => $request->email, 'token' => $request->token])
                            ->first();

        if(!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');

          $user = Citizen::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('citizen_password_resets')->where(['email'=> $request->email])->delete();

          return redirect('/citizen/login')->with('info', 'Your password has been changed!');

    }
}
