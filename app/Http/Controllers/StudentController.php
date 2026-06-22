<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    // show form
    public function create()
    {
        $courses = Course::all();
        return view('student.create', compact('courses'));
    }

    // store student + attach courses
    public function store(Request $request)
    {
        $student = Student::create([
            'name' => $request->name
        ]);

        // attach selected courses
        $student->courses()->attach($request->course_ids);

        return redirect('/students');
    }

    // show all
    public function index()
    {
        $students = Student::with('courses')->get();
        return view('student.index', compact('students'));
    }
    //edit form
    public function edit($id){
        $student=Student::with('courses')->get();
        $courses=Course::all();
        return view('student.edit',compact('student','courses'));

    }
}