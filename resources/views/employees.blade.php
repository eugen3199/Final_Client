<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        <u>Employee</u>
    </h1>
    <ul>
        <li><a href="/dashboard">Dashboard</a></li>
        <li><a href="/dashboard/employees">Employees</a></li>
        <li><a href="/dashboard/empdata">Employee Related Data</a></li>
        <li><a href="/dashboard/student">Students</a></li>
        <li><a href="/dashboard/studdata">Student Related Data</a></li>
        <li><a href="/dashboard/users">Users</a></li>
    </ul>
    <hr>
    <form action="{{ route('employees.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <th colspan="2">
                    Employee Create Form
                </th>
            </tr>
            <tr>
                <td>Card ID</td>
                <td><input type="text" name="empCardID"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="empName"></td>
            </tr>
            <tr>
                <td>NRC</td>
                <td><input type="text" name="empNRC"></td>
            </tr>
            <tr>
                <td>Join Date</td>
                <td><input type="text" name="empJoinDate"></td>
            </tr>
            <tr>
                <td>Phone No.</td>
                <td><input type="text" name="empPhone"></td>
            </tr>
            <tr>
                <td>Campus</td>
                <td>
                    <select name="empCampusID">
                        <option value="1">Main</option>
                        <option value="2">U Khun Zaw</option>
                        <option value="3">Mya Kan Thar</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Department</td>
                <td>
                    <select name="empDeptID">
                        <option value="1">IT</option>
                        <option value="2">Admin</option>
                        <option value="3">HR</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Position</td>
                <td>
                    <select name="empPosID">
                        <option value="1">Associate</option>
                        <option value="2">Senior Associate</option>
                        <option value="3">Manager</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Emergency Contact Person</td>
                <td><input type="text" name="empEmgcPerson"></td>
            </tr>
            <tr>
                <td>Emergency Contact Phone No.</td>
                <td><input type="text" name="empEmgcPhone"></td>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" name="submit" value="Submit"></th>
            </tr>
        </table>
    </form>
    <hr>
    <table border="1">
        <tr>
            <td>
                id
            </td>
            <td>
                Name
            </td>
            <td>
                Config
            </td>
        </tr>
        @foreach ($contents as $employee)
        <tr>
            <td>
                {{ $employee->empCardID }}
            </td>
            <td>
                {{ $employee->empName }}
            </td>
            <td>
                <a href="{{ route('employees.show', $employee->id) }}">Details</a>|<a href="{{ route('employees.destroy', $employee->id) }}">Delete</a>
            </td>
            
        </tr>
        @endforeach
    </table>
    
</body>
</html>