<h2>Students List</h2>

@foreach($students as $student)

    <h3>{{ $student->name }}</h3>

    <ul>
        @foreach($student->courses as $course)
            <li>{{ $course->name }}</li>
        @endforeach
    </ul>

    <a href="/student/edit/{{ $student->id }}">Edit</a>
    <a href="/student/delete/{{ $student->id }}">Delete</a>

    <hr>

@endforeach