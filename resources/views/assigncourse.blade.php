@extends('layouts.app')

@section('content')

<h2>Assign Course</h2>

<form action="/assigncourse" method="POST">
    @csrf

    <label>Select Student</label>

    <select name="student_id">
        @foreach($students as $student)
            <option value="{{ $student->id }}">
                {{ $student->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <label>Select Courses</label>

    @foreach($courses as $course)
        <br>

        <input
            type="checkbox"
            name="course_ids[]"
            value="{{ $course->id }}">

        {{ $course->name }}

    @endforeach

    <br><br>

    <button type="submit">
        Assign Courses
    </button>

</form>

@endsection