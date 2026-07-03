<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Signup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class SignupController extends Controller
{
    //
    public function register(Request $request){
        try{
            
            $request->validate([
                'name'=>"required|min:3",
                'email'=>"required|email|unique:signups,email",
                'password'=>"required|min:8|confirmed",
            ]);
            $signup=Signup::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),//converting pw into hash code
    
            ]);
            return response()->json([
                'success'=>true,
                'message'=>"User created successfully",
                'user'=>$signup
            ],201);
        }catch(ValidationException $e){
            return response()->json([
                'success'=>false,
                'message'=>'Validation failed',
                'errors'=>$e->errors()
            ],422);
        }
        }
       
}
