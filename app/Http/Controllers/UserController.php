<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    public function showLoginForm() {
        $user_title = "Login";
        $user_type = "login";
        return view("user.users",compact('user_title','user_type'));
    }
    public function showRegisterForm() {
        $user_title = "Register";
        $user_type = "register";
         return view("user.users",compact('user_title','user_type'));
    }

    public function createAccount(Request $req){
        // dd($req->all());
        $credentials = $req->validate([
            'name'=> "required",
            'email'=>"required|email",
            "password"=>"required",
        ]);
            
             $user = User::create([
            'name'     => $req->name,
            'email'    => $req->email,
            'password' => Hash::make($req->password),
            ]);
            Auth::guard("users")->login($user);
            return redirect("register");
        
       
    }

    public function login(Request $req ){
        $credentials = $req->validate([
            'email'=>"required|email",
            "password"=>"required",
        ]);
        if(Auth::attempt($credentials)){
            return redirect('/cars');
        }
         return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::guard('users')->logout();
        return redirect('/login');
    }
}
