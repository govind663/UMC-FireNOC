<?php

namespace App\Http\Controllers\Citizen\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Citizen;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function Citizen_Register_Form()
    {
        return view('citizen.auth.register');
    }

    public function Store_Citizen_Register_Form(Request $request)
    {
        $request->validate([
            'f_name' => 'required|string',
            'm_name' => 'required|string',
            'l_name' => 'required|string',
            'mobile_no' => 'required|numeric|unique:citizens|digits:10',
            'email' => 'required|string|email|max:255|unique:citizens|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ], [
            'f_name.required' => 'First Name is required',
            'm_name.required' => 'Middle Name is required',
            'l_name.required' => 'Last Name is required',
            'mobile_no.required' => 'Mobile Number is required',
            'email.required' => 'Email Id is required',
            'password.required' => 'Password is required',
            'password_confirmation.required' => 'Confirm Password is required',
        ]);

        $data = new Citizen();

        $data->f_name = $request->get('f_name');
        $data->m_name = $request->get('m_name');
        $data->l_name = $request->get('l_name');
        $data->mobile_no = $request->get('mobile_no');
        $data->email = $request->get('email');
        $data->password = Hash::make($request->get('password'));
        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->save();

        $update = [
            'inserted_by' => $data->id,
        ];

        Citizen::where('id', $data->id)->update($update);

        return redirect('/citizen/login')->with('info', 'You are Register Sucessfully.');
    }
}
