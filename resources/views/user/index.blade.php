<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
</head>
<body>

<h1>All Users</h1>

@foreach($users as $user)
    <h2>{{ $user->name }}</h2>

    <a href="/user/{{ $user->id }}">View Posts</a>

    <hr>
@endforeach

</body>
</html>