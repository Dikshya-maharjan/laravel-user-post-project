<h1>Students Grouped by Faculty</h1>

@foreach($result as $faculty => $students)
    <h3>{{ $faculty }}</h3>

    @foreach($students as $student)
        <p>{{ $student['name'] }}</p>
    @endforeach

    <hr>
@endforeach
<a href="/users/filter">Back</a>