<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR View</title>
</head>
<body>
    <hr>
    <table border="1">
        <tr>
            <th colspan="2">{{ $employee->empName }}'s Profile<br><img src="https://i.pinimg.com/originals/f1/0f/f7/f10ff70a7155e5ab666bcdd1b45b726d.jpg" width="200px"></th>
        </tr>
        <tr>
            <td>
                Employee Card ID
            </td>
            <td>
                {{ $employee->empCardID }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Name
            </td>
            <td>
                {{ $employee->empName }}
            </td>
        </tr>
        <tr>
            <td>
                Employee NRC
            </td>
            <td>
                {{ $employee->empNRC }}
            </td>
        </tr>
        
        <tr>
            <td>
                Employee Join Date
            </td>
            <td>
                {{ $employee->empJoinDate }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Campus
            </td>
            <td>
                {{ $campus->CampusName }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Department
            </td>
            <td>
                {{ $department->deptName }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Position
            </td>
            <td>
                {{ $position->posName }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Emergency Contact Person
            </td>
            <td>
                {{ $employee->empEmgcPerson }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Emergency Contact No.
            </td>
            <td>
                {{ $employee->empEmgcPhone }}
            </td>
        </tr>
    </table>
</body>
</html>