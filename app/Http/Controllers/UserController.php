<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email
        ]);

        $user->posts()->create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect("/user/$user->id");
    }

    public function show($id)
    {
        $user = User::with('posts')->findOrFail($id);

        return view('user.show', compact('user'));
    }
    public function index()
{
    $users = User::with('posts')->get();
    return view('user.index', compact('users'));
}
}