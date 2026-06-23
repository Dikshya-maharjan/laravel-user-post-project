<h2>Students in {{ $course->name }}</h2>

@foreach($course->students as $student)
    {{ $student->name }}
    <br>
@endforeach