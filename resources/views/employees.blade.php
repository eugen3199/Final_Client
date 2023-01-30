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
        Employees
    </h1>
    <ul>
        <li><a href="dashboard">Dashboard</a></li>
        <li><a href="/dashboard/employees">Employees</a></li>
        <li><a href="/dashboard/empdata">Employee Related Data</a></li>
        <li><a href="/dashboard/student">Students</a></li>
        <li><a href="/dashboard/studdata">Student Related Data</a></li>
        <li><a href="/dashboard/users">Users</a></li>
    </ul>

    <form action="/dashboard/employees" method="post">
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
                    <select name="empCampusID">
                        <option value="1">IT</option>
                        <option value="2">Admin</option>
                        <option value="3">HR</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Position</td>
                <td>
                    <select name="empCampusID">
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
        </table>
    </form>
    <table>
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

        <tr>
            <td>
                
            </td>
            <td>
                
            </td>
            <td>
                
            </td>
        </tr>

    </table>
</body>
</html>