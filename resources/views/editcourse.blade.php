@extends('layouts.app')

@section('title','Edit Course')

@section('content')

<h2>Edit Course</h2>

<form action="/course/update/{{ $courses->id }}" method="POST">

@csrf

<input
type="text"
name="name"
value="{{ $courses->name }}"
class="form-control">

<br>

<button class="btn btn-success">
Update
</button>

</form>

@endsection