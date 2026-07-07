<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IdCardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\WebController\SignupController;
use App\Http\Controllers\WebController\LoginController;


//  Home


Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('bootstrapdemo.about');
});


//  Basic User Routes


Route::post('/user', [PostController::class, 'store']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/users', [UserController::class, 'index']);

Route::get('/create', function () {
    return view('user.create');
});

Route::get('/user/create/{user}', function ($user) {
    return view('posts.create', compact('user'));
});


//  Orders & Customers


Route::get('/orders', [OrderController::class, 'index']);

Route::get('/customer/create', [CustomerController::class, 'create']);
Route::post('/customer/store', [CustomerController::class, 'store']);

Route::get('/order/create', [OrderController::class, 'create']);
Route::post('/order/store', [OrderController::class, 'store']);


// Employees


Route::get('/employee/create', [EmployeeController::class, 'create']);
Route::post('/employee/store', [EmployeeController::class, 'store']);
Route::get('/employees', [EmployeeController::class, 'index']);


// ID Card


Route::get('/idcard/create', [IdCardController::class, 'create']);
Route::post('/idcard/store', [IdCardController::class, 'store']);


// Students


Route::get('/student/create', [StudentController::class, 'create']);
Route::post('/student/store', [StudentController::class, 'store']);

Route::get('/students', [StudentController::class, 'index']);

Route::get('/student/edit/{id}', [StudentController::class, 'edit']);
Route::post('/student/update/{id}', [StudentController::class, 'update']);

Route::get('/student/delete/{id}', [StudentController::class, 'destroy']);


// Courses


Route::get('/course/create', [CourseController::class, 'create']);
Route::post('/course/store', [CourseController::class, 'store']);
Route::get('/courses', [CourseController::class, 'index']);


// Collections


Route::prefix('users')->group(function () {

    Route::get('/', [CollectionController::class, 'index']);
    Route::get('/filter', [CollectionController::class, 'filter']);
    Route::get('/map', [CollectionController::class, 'map']);
    Route::get('/first', [CollectionController::class, 'first']);
    Route::get('/count', [CollectionController::class, 'count']);
    Route::get('/group', [CollectionController::class, 'group']);
    Route::get('/sort', [CollectionController::class, 'sort']);
    Route::get('/sum', [CollectionController::class, 'sum']);
    Route::get('/avg', [CollectionController::class, 'avg']);
    Route::get('/adults', [CollectionController::class, 'adultUsers']);
});


// Persons


Route::get('/persons/create', [PersonController::class, 'create']);
Route::post('/persons/store', [PersonController::class, 'store'])->name('persons.store');

Route::get('/persons/active', [PersonController::class, 'activeUsers']);
Route::get('/persons', [PersonController::class, 'index']);


// posts


Route::get('/posts/group', [PostController::class, 'groupPosts']);


// Authentication


Route::get('/signup', [SignupController::class, 'index'])->name('signup');
Route::post('/signup', [SignupController::class, 'register'])->name('signup.post');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Authenticated Users


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('layouts.app');
    })->name('dashboard');

    Route::get('/listcourses', [CourseController::class, 'index']);
});


// Admin Only



Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/liststudents', [StudentController::class, 'index']);

    Route::get('/assignroles', [SignupController::class, 'showAssignRoles']);
    Route::post('/assignroles', [SignupController::class, 'assignRole']);

});