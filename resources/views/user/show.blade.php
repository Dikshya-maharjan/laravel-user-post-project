<!DOCTYPE html>
<html>
<head>
    <title>Show User</title>
</head>
<body>

<h1>User Name: {{ $user->name }}</h1>
<p>Email: {{ $user->email }}</p>

<h2>Posts:</h2>

@foreach($user->posts as $post)
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->body }}</p>
@endforeach

</body>
</html>