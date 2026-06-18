<!DOCTYPE html>
<html>
<head>
    <title>Create User & Post</title>
</head>
<body>

<h2>Create User and Post</h2>

<form action="/user" method="POST">
    @csrf

    <h3>User Info</h3>
    <input type="text" name="name" placeholder="User Name"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>

    <h3>Post Info</h3>
    <input type="text" name="title" placeholder="Post Title"><br><br>
    <textarea name="body" placeholder="Post Body"></textarea><br><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>