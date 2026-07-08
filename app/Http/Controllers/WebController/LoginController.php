<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
class LoginController extends Controller

{
    //
   public function index()
{
    // If already logged in
    if (Auth::check()) {

        if (Auth::user()->hasRole('admin')) {
            return redirect('/liststudents');
        }

        return redirect('/dashboard');
    }

    // Show login page
    return view('login');
}
  public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt([
        'email' => $request->email,
        'password' => $request->password,
    ])) {

        $request->session()->regenerate();

        if (Auth::user()->hasRole('admin')) {
            return redirect('/liststudents');
        }

        return redirect('/dashboard');
    }

    return back()->withErrors([
        'email' => 'Invalid email or password.',
    ])->withInput();
}
    
     public function logout(Request $request)
    {
        Auth::logout();//removeauthentication
        $request->session()->invalidate();//destroy session

        $request->session()->regenerateToken();//create new csrf

        return redirect('/login');
    }

}
