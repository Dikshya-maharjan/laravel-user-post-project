<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Signup;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OA;

class SignupController extends Controller
{
    //
    #[OA\Post(
    path: "/api/register",
    operationId: "registerUser",
    summary: "Register a new user",
    description: "Creates a new user account and assigns the default 'student' role.",
    tags: ["Authentication"]
)]
#[OA\RequestBody(
    required: true,
    content: new OA\JsonContent(
        required: ["name", "email", "password", "password_confirmation"],
        properties: [
            new OA\Property(
                property: "name",
                type: "string",
                example: "Ram Sharma"
            ),
            new OA\Property(
                property: "email",
                type: "string",
                format: "email",
                example: "ram@gmail.com"
            ),
            new OA\Property(
                property: "password",
                type: "string",
                format: "password",
                example: "password123"
            ),
            new OA\Property(
                property: "password_confirmation",
                type: "string",
                format: "password",
                example: "password123"
            )
        ]
    )
)]
#[OA\Response(
    response: 201,
    description: "User registered successfully"
)]
#[OA\Response(
    response: 422,
    description: "Validation failed"
)]

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
            $signup->assignRole('student');

            Auth::login($signup);
            $request->session()->regenerate();
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
