<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class StudentController extends Controller
{
    // SHOW CREATE FORM
    public function create()
    {
        $courses = Course::all();
        return view('student.create', compact('courses'));
    }

    // STORE STUDENT and COURSES
    public function store(Request $request)
    {
        $student = Student::create([
            'name' => $request->name
        ]);

        $student->courses()->attach($request->course_ids);

        return redirect('/students');
    }

    // SHOW ALL STUDENTS
    public function index()
    {
        $students = Student::with('courses')->get();
        return view('student.index', compact('students'));
    }
   

    // EDIT FORM
    public function edit($id)
    {
        $student = Student::with('courses')->findOrFail($id);
        $courses = Course::all();

        return view('student.edit', compact('student', 'courses'));
    }

    // UPDATE STUDENT and COURSES
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->update([
            'name' => $request->name
        ]);
//synce use to manage and update M:M db relationships
        $student->courses()->sync($request->course_ids);

        return redirect('/students');
    }

    // DELETE STUDENT
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        $student->courses()->detach();
        $student->delete();

        return redirect('/students');
    }
}