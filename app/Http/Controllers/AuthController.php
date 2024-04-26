<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }

    public function postLogin(){
       $formData= request()->validate([
            "email"=>["required","email","max:255",Rule::exists("users","email")],
            "password"=>["required","min:8","max:255"]
        ],[
            "email.required"=>"We need your email address",
            "password.min"=>"Password should be more than 8 characters"
        ]);

        if(auth()->attempt($formData)){
            return redirect("/")->with("success","Welcome back ".auth()->user()->name);
        }else{
            return redirect()->back()->withErrors([
                "email" =>"User Credentials Wrong",
            ]);
        }
    }

    public function logout(){
        auth()->logout();
        return redirect("/")->with("success","Good Bye");
    }
}
