<h2>Edit Student</h2>

<form method="POST" action="/student/update/{{ $student->id }}">
    @csrf

    <input type="text" name="name" value="{{ $student->name }}">

    <h4>Courses:</h4>

    @foreach($courses as $course)
        <label>
            <input type="checkbox"
                   name="course_ids[]"
                   value="{{ $course->id }}"
                   {{ $student->courses->contains($course->id) ? 'checked' : '' }}>
            {{ $course->name }}
        </label>
        <br>
    @endforeach

    <button type="submit">Update</button>
</form>