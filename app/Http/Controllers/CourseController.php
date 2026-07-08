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
        return view('listcourses', compact('courses'));
    }
    public function edit(Request $request,$id){
        $courses=Course::findorFail($id);
            return view('editcourse', compact('courses'));

    }
    public function update(Request $request, $id)
{
    $course = Course::findOrFail($id);

    $course->update([
        'name' => $request->name
    ]);

    return redirect('/listcourses');
}


public function destroy($id)
{
    $course = Course::findOrFail($id);

    $course->student()->detach();
    $course->delete();

    return redirect('/listcourses')
            ->with('success', 'Course deleted successfully.');
}
}