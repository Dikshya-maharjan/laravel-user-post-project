@extends('layouts.app')

@section('title', 'Students')

@section('content')

<div class="container mt-4">

    <h2>Student List</h2>

   <table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
    </tr>

    @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->getRoleNames()->implode(', ') }}</td>
        </tr>
    @endforeach
</table>

</div>

@endsection