<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Redirect;

class User_Controller extends Controller
{
    public function signup(Request $request)
    {
        $data=$request->validate([
            'name'=>['required'],
            'email'=>['required','email',Rule::unique('users','email')],
            'password'=>['required']
        ]);
        $data['password']=bcrypt($data['password']);
        $user=User::create($data);
        auth()->login($user);
        return redirect("/user");
    }

    public function signin(Request $request)
    {
        $data=$request->validate([
            'loginemail'=>['required','email'],
            'loginpassword'=>['required']
        ]);
        if(auth()->attempt(['email'=>$data['loginemail'], 'password'=>$request['loginpassword']])){
            $request->session()->regenerate();
        }
        else{
            $invalidData="Please Enter Correct Email And Respective Password";
            // return redirect('/user',compact('invalidData'));
            // return redirect()->route('user',[
            //     'invalidData'=>$invalidData
            // ]);
            
            return Redirect::route('user')->with( ['invalidData' => $invalidData] );

        }
        return redirect('/user');
    }
}
