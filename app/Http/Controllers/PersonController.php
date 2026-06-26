<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    public function index()
{
    $persons = Person::all();

    return view('collection.personindex', compact('persons'));
}
    public function create()
    {
        return view('collection.persons');
    }
public function store(Request $request)
{
    Person::create([
        'name' => $request->name,
        'email' => $request->email,
        'active' => $request->active,
    ]);

    return redirect('/persons/create')
        ->with('success', 'Person added successfully');
}


    public function activeUsers()
    {
        $emails = Person::where('active', 1)->pluck('email');

        return view('collection.activeusers', compact('emails'));
    }
}