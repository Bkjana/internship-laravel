<?php

namespace App\Http\Controllers;

use App\Models\userregister;
use Illuminate\Http\Request;

class Form extends Controller
{
    public function submit()
    {
        return view('form');
    }

    public function register(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
                // 'confpassword'=>'required|same:password'

            ]
        );

        // echo "<pre>";
        // print_r($request->all());

        $UserRegister = new userregister;
        $UserRegister -> name = $request['name'];
        $UserRegister -> email = $request['email'];
        $UserRegister -> password = md5($request['password']);
        $UserRegister -> save();
    }
}
