<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>

<h2>Signup</h2>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/signup" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Name" value="{{ old('name') }}">
    <br><br>

    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    <br><br>

    <input type="password" name="password" placeholder="Password">
    <br><br>

    <input type="password" name="password_confirmation" placeholder="Confirm Password">
    <br><br>
    <select name="role" class="form-control">
    <option value="student">Student</option>
    <option value="admin">Admin</option>
</select>

    <button type="submit">Signup</button>
</form>

<a href="{{ route('login') }}">Already have an account? Login</a>

</body>
</html>