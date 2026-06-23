<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/user', [PostController::class, 'store']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/create',function(){
    return view('user.create');
});
Route::get('/user/create/{user}', function ($user) {
    return view('posts.create', compact('user'));
});
Route::get('/orders',[OrderController::class,'index']);

Route::get('/customer/create', [CustomerController::class, 'create']);
Route::post('/customer/store', [CustomerController::class, 'store']);

Route::get('/order/create', [OrderController::class, 'create']);
Route::post('/order/store', [OrderController::class, 'store']);
use App\Http\Controllers\EmployeeController;

Route::get('/employee/create', [EmployeeController::class, 'create']);
Route::post('/employee/store', [EmployeeController::class, 'store']);

Route::get('/employees', [EmployeeController::class, 'index']);
// student and id card

use App\Http\Controllers\IdCardController;

Route::get('/idcard/create', [IdCardController::class, 'create']);
Route::post('/idcard/store', [IdCardController::class, 'store']);
use App\Http\Controllers\StudentController;

Route::get('/student/create', [StudentController::class, 'create']);
Route::post('/student/store', [StudentController::class, 'store']);

Route::get('/students', [StudentController::class, 'index']);

Route::get('/student/edit/{id}', [StudentController::class, 'edit']);
Route::post('/student/update/{id}', [StudentController::class, 'update']);

Route::get('/student/delete/{id}', [StudentController::class, 'destroy']);
// course
use App\Http\Controllers\CourseController;

Route::get('/course/create', [CourseController::class, 'create']);
Route::post('/course/store', [CourseController::class, 'store']);
Route::get('/courses', [CourseController::class, 'index']);

//collection

use App\Http\Controllers\CollectionController;
Route::get('/users',[CollectionController::class,'index']);
Route::get('/users',[CollectionController::class,'filter']);
Route::get('/users/map',[CollectionController::class,'map']);