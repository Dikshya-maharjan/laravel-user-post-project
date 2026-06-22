<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        Course::create([
            'name' => $request->name
        ]);

        return redirect('/courses');
    }

    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }
}