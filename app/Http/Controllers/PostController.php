<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PostController extends Controller
{
    public function store(Request $request)
    {
        // Find existing user or create a new one
        $user = User::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );

        // Create a post for that user
        $user->posts()->create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect("/user/$user->id");
    }
    public function read(){
            $users=User::all();
            return view('user.index',compact('users'));
    }
    }