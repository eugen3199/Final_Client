<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <h1>
        Dashboard
    </h1>

    <a href="{{ url('/login') }}">Login</a> | <a href="{{ url('/logout') }}">Logout</a>

    <ul>
        <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
        <li><a href="{{ url('/employees') }}">Employees</a></li>
        <li>
            Employee Related Data
            <ul>
                <li><a href="{{ url('/emprelated/campuses') }}">Campuses</a></li>
                <li><a href="{{ url('/emprelated/departments') }}">Departments</a></li>
                <li><a href="{{ url('/emprelated/positions') }}">Positions</a></li>
                <li><a href="{{ url('/emprelated/prefixes') }}">Prefixes</a></li>
            </ul>
        </li>
        <li><a href="{{ url('/students') }}">Students</a></li>
        <li>Student Related Data
            <ul>
                <li><a href="{{ url('/studrelated/classes') }}">Campuses</a></li>
                <li><a href="{{ url('/studrelated/batches') }}">Departments</a></li>
                <li><a href="{{ url('/emprelated/prefixes') }}">Prefixes</a></li>
            </ul>
        </li>
        <li><a href="{{ url('/users') }}">Users</a></li>
    </ul>
    <hr>
    @yield('contents')
</body>
</html>