<?php

namespace App\Http\Controllers\Citizen\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class ForgotPasswordController extends Controller
{
    public function getEmail()
    {

       return view('citizen.auth.passwords.email');
    }

    public function postEmailOld(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:citizens|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
        ],[
           'email.required' => 'Email Id is required',
          ]);

        // $token = Str::random(60);

        // DB::table('citizen_password_resets')->insert(
        //     ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
        // );

        Mail::send(function($message) use ($request) {
                  $message->from('cfcpmc@gmail.com');
                  $message->to($request->email);
                  $message->subject('Reset Password Notification');
               });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }
    
    public function postEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = DB::table('citizens')->where('email', $request->email)->first();
        // dd($user);

        if (!$user) {
            return back()->with('message', 'No user found with this email address');
            // return response()->json(['message' => 'No user found with this email address.'], 404);
        }

        try {
            // Send password via email
            Mail::raw('Your password is: ' . $user->og_password, function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Your Password');
            });

            return back()->with('message', 'Password has been sent to your email.');
            // return response()->json(['message' => 'Password has been sent to your email.']);
        } catch (\Exception $e) {
            \Log::info($e);
            return back()->with('message', 'Failed to send password. Please try again.');
            // return response()->json(['message' => 'Failed to send password. Please try again.'], 500);
        }
    }
}
