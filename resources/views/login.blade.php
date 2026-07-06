<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/login" method="POST">
    @csrf

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    <br><br>

    <input type="password" name="password" placeholder="Password">
    <br><br>

    <button type="submit">Login</button>
</form>

<a href="/signup">Create an account</a>

</body>
</html>