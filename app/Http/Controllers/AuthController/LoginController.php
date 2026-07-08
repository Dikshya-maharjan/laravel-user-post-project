<?php

namespace App\Http\Controllers\AuthController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\Login;
use App\Models\Signup;
use OpenApi\Attributes as OA;


class LoginController extends Controller
{
    //

#[OA\Post(
    path: "/api/login",
    operationId: "loginUser",
    summary: "User Login",
    tags: ["Authentication"]
)]
#[OA\RequestBody(
    required: true,
    content: new OA\JsonContent(
        required: ["email", "password"],
        properties: [
            new OA\Property(
                property: "email",
                type: "string",
                format: "email",
                example: "dikshya@gmail.com"
            ),
            new OA\Property(
                property: "password",
                type: "string",
                format: "password",
                example: "password123"
            )
        ]
    )
)]
#[OA\Response(
    response: 200,
    description: "Login successful"
)]
#[OA\Response(
    response: 401,
    description: "Invalid credentials"
)]

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
                    // update and create
                $login=Login::updateorCreate([
                    'email'=>$signup->email],
                    [
                    'name'=>$signup->name,
                    'password'=>$signup->password,
                ]);
                //updateOrCreate() is an eloquent method that combines 2 operations into 2 like 
                //generate sanctum token
                                $token=$signup->createToken('student-token')->plainTextToken;
                                return response()->json([
                                    'success'=>true,
                                    'message'=>'Login successfully',
                                    'login'=>$login,
                                    'token'=>$token
                                ],200);
            
             

        }

    #[OA\Get(
    path: "/api/profile",
    operationId: "userProfile",
    summary: "Get logged in user's profile",
    security: [["sanctum" => []]],
    tags: ["Authentication"]
)]
#[OA\Response(
    response: 200,
    description: "Profile fetched successfully"
)]
#[OA\Response(
    response: 401,
    description: "Unauthenticated"
)]

    public function profile(Request $request){
            return response()->json([
                'success'=>true,
                'user'=>$request->user()
            ]);
    }
    #[OA\Post(
    path: "/api/logout",
    operationId: "logoutUser",
    summary: "Logout user",
    security: [["sanctum" => []]],
    tags: ["Authentication"]
)]
#[OA\Response(
    response: 200,
    description: "Logout successful"
)]
#[OA\Response(
    response: 401,
    description: "Unauthenticated"
)]

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'success'=>true,
            'message'=>'Logout successful'
        ]);
    }
}
