@extends('layouts.app')

@section('title','Courses')

@section('content')

<h2>Course List</h2>

<div class="row">

@foreach($courses as $course)

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h5>{{ $course->name }}</h5>

<a href="/course/edit/{{ $course->id }}" class="btn btn-primary">
Edit
</a>
 <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this course?')">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    Delete
                </button>
            </form>

</div>

</div>

</div>

@endforeach

</div>

@endsection