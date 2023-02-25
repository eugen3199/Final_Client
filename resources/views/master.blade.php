<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
        <li><a href="{{ url('/dashboard/employees') }}?page=1">Employees</a></li>
        <li>
            Employee Related Data
            <ul>
                <li><a href="{{ url('/emprelated/campuses') }}">Campuses</a></li>
                <li><a href="{{ url('/emprelated/departments') }}">Departments</a></li>
                <li><a href="{{ url('/emprelated/positions') }}">Positions</a></li>
            </ul>
        </li>
        <li><a href="{{ url('/dashboard/students') }}?filterClassID=*&page=1">Students</a></li>
        <li>Student Related Data
            <ul>
                <li><a href="{{ url('/studrelated/classes') }}">Classes</a></li>
                <li><a href="{{ url('/studrelated/batches') }}">Batches</a></li>
            </ul>
        </li>
        <li><a href="{{ url('/dashboard/users') }}">Users</a></li>
    </ul>
    <hr>
    @yield('contents')
</body>
</html>