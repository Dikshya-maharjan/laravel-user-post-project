<h2>Create Course</h2>

<form method="POST" action="/course/store">
    @csrf

    <input type="text" name="name" placeholder="Course Name">

    <button type="submit">Save</button>
</form>