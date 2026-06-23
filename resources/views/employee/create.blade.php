<h2>Create Employee</h2>
<b>One-to-One Relation Demo</b>

<form method="POST" action="/employee/store">
    @csrf

    <input type="text" name="name" placeholder="Employee Name"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>

    <button type="submit">Save Employee</button>
</form>