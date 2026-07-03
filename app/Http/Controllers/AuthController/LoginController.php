<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Login;
use App\Models\Signup;

class LoginController extends Controller
{
    //
   
    public function login(Request $request){
            $request->validate([
                'email'=>'required|email',
                'password'=>'required'
            ]);
            $signup=Signup::where('email',$request->email)->first();
                if(!$signup || !Hash::check($request->password,$signup->password)){
                    return response()->json([
                        'success'=>false,
                        'message'=>'Invalid Details'
                    ],401);
                }
                //updateOrCreate() is an eloquent method that combines 2 operations into 2 like 
                // update and create
                $login=Login::updateorCreate([
                    'email'=>$signup->email],
                    [
                    'name'=>$signup->name,
                    'password'=>$signup->password,
                ]);
             
//generate sanctum token
                $token=$signup->createToken('student-token')->plainTextToken;
                return response()->json([
                    'success'=>true,
                    'message'=>'Login successfully',
                    'login'=>$login,
                    'token'=>$token
                ],200);

        }

    
    public function profile(Request $request){
            return response()->json([
                'success'=>true,
                'user'=>$request->user()
            ]);
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Logout successful'
        ]);
    }
}
