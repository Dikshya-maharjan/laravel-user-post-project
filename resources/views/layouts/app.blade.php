<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<header class="navbar">

    <h2>Welcome {{ Auth::user()->name }}</h2>

    <nav>
        <ul class="nav-links">

            <li><a href="/dashboard">Dashboard</a></li>

            <li><a href="/listcourses">Courses</a></li>

            @if(Auth::user()->hasRole('admin'))
                <li><a href="/liststudents">Students</a></li>
                <li><a href="/assignroles">Assign Roles</a></li>
            @endif

        </ul>
    </nav>

    <form action="/logout" method="POST">
        @csrf
        <button class="logout-btn">Logout</button>
    </form>

</header>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>