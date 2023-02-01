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
        Dashboard
    </h1>

    <a href="login">Login</a> | <a href="logout">Logout</a>

    <ul>
        <li><a href="dashboard">Dashboard</a></li>
        <li><a href="/dashboard/employees">Employees</a></li>
        <li><a href="/dashboard/empdata">Employee Related Data</a></li>
        <li><a href="/dashboard/student">Students</a></li>
        <li><a href="/dashboard/studdata">Student Related Data</a></li>
        <li><a href="/dashboard/users">Users</a></li>
    </ul>
    <hr>
    <table>
        <tr>
            <td>
                Employee Card ID
            </td>
            <td>
                {{ $contents->empCardID }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Name
            </td>
            <td>
                {{ $contents->empName }}
            </td>
        </tr>
        <tr>
            <td>
                Employee NRC
            </td>
            <td>
                {{ $contents->empNRC }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Phone no.
            </td>
            <td>
                {{ $contents->empPhone }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Join Date
            </td>
            <td>
                {{ $contents->empJoinDate }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Campus
            </td>
            <td>
                {{ $contents->empCampusID }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Department
            </td>
            <td>
                {{ $contents->empDeptID }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Position
            </td>
            <td>
                {{ $contents->empPosID }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Emergency Contact Person
            </td>
            <td>
                {{ $contents->empEmgcPerson }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Emergency Contact No.
            </td>
            <td>
                {{ $contents->empEmgcPhone }}
            </td>
        </tr>
    </table>
</body>
</html>