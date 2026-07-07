<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\AuthController\SignupController;
use App\Http\Controllers\AuthController\LoginController;
Route::post('/register',[SignupController::class,'register']);
Route::post('/login',[LoginController::class,'login']);

Route::middleware('auth:sanctum')->group(function(){
      Route::get('/profile', [LoginController::class, 'profile']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/store',[StudentController::class,'store']);
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('/index',[StudentController::class,'index']);
Route::get('/show/{id}',[StudentController::class,'show']);
Route::delete('/delete/{id}',[StudentController::class,'destroy']);  
Route::put('/update/{id}',[StudentController::class,'update']);

Route::get('/courses',[CourseController::class,'index']);
Route::post('/course',[CourseController::class,'store']);
Route::get('/showcourse/{id}',[CourseController::class,'show']);
Route::delete('/deletecourse/{id}',[CourseController::class,'destroy']);  
Route::put('/updatecourse/{id}',[CourseController::class,'update']);



?>