<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Signup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


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
        $signup->assignRole('student');

        Auth::login($signup);//stores the user id in the session
        $request->session()->regenerate();
         return redirect('/login')->with('sucess','User register successfully');
    }
    public function showAssignRoles()
{
    $users = Signup::all();
    $roles = Role::all();

    return view('assignroles', compact('users', 'roles'));
}

public function assignRole(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:signups,id',
        'role' => 'required|exists:roles,name',
    ]);

    $user = Signup::findOrFail($request->user_id);

    $user->syncRoles([$request->role]);

    return back()->with('success', 'Role assigned successfully.');
}
}
