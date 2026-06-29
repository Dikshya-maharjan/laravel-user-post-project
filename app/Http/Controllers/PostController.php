<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

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
     public function groupPosts()
    {
        $posts = collect([
            ['title' => 'Laravel Basics', 'user_id' => 1],
            ['title' => 'PHP OOP', 'user_id' => 1],
            ['title' => 'React Guide', 'user_id' => 2],
            ['title' => 'Vue Tutorial', 'user_id' => 2],
            ['title' => 'Java Notes', 'user_id' => 3],
         ['title' => 'Java Notes', 'person_id' => 3],

        ]);

        $result = $posts->groupBy('person_id');

        return view('collection.posts', compact('result'));
    }


}
    