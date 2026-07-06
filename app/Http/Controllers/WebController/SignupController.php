<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Signup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class SignupController extends Controller
{
    //
    public function index(){
        return view('signup');
    }
    public function register(Request $request){
        $request->validate([
              'name' => 'required|min:3',
                'email' => 'required|email|unique:signups,email',
                'password' => 'required|min:8|confirmed',
        ]);   
        $signup=Signup::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        Auth::login($signup);//stores the user id in the session
        $request->session()->regenerate();
         return redirect('/login')->with('sucess','User register successfully');
    }
}
