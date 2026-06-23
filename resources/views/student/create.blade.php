<h2>Create Student</h2>

<form method="POST" action="/student/store">
    @csrf

    <input type="text" name="name" placeholder="Student Name">
    <br><br>

    <h4>Select Courses:</h4>

    @foreach($courses as $course)
        <label>
            <input type="checkbox" name="course_ids[]" value="{{ $course->id }}">
            {{ $course->name }}
        </label>
        <br>
    @endforeach

    <button type="submit">Save</button>
</form>