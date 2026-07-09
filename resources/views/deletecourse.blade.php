@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table">
    <tr>
        <th>ID</th>
        <th>Course Name</th>
        <th>Action</th>
    </tr>

    @foreach($courses as $course)
    <tr>
        <td>{{ $course->id }}</td>
        <td>{{ $course->name }}</td>
        <td>
            <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this course?')">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>