<?php

namespace App\Http\Controllers\WebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    //
    public function index(){
        return view('/login');
        if (Auth::user()->hasRole('admin')) {
    return redirect('/admin/dashboard');
}
if (Auth::user()->hasRole('admin')) {
    return redirect('/liststudents');
}

return redirect('/dashboard');

    }
    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'

        ]);

            if (Auth::attempt([//checks the password and creates the session
            'email' => $request->email,
            'password' => $request->password
        ])) {

            $request->session()->regenerate();

            return redirect('/dashboard');
        }
    }
    
     public function logout(Request $request)
    {
        Auth::logout();//removeauthentication
        $request->session()->invalidate();//destroy session

        $request->session()->regenerateToken();//create new csrf

        return redirect('/login');
    }

}
