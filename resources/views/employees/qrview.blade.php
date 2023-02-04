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
        @foreach ($contents as $content)
        <tr>
            <th colspan="2">{{ $content->empName }}'s Profile<br><img src="https://i.pinimg.com/originals/f1/0f/f7/f10ff70a7155e5ab666bcdd1b45b726d.jpg" width="200px"></th>
        </tr>
        <tr>
            <td>
                Employee Card ID
            </td>
            <td>
                {{ $content->empCardID }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Name
            </td>
            <td>
                {{ $content->empName }}
            </td>
        </tr>
        <tr>
            <td>
                Employee NRC
            </td>
            <td>
                {{ $content->empNRC }}
            </td>
        </tr>
        
        <tr>
            <td>
                Employee Join Date
            </td>
            <td>
                {{ $content->empJoinDate }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Campus
            </td>
            <td>
                {{ $content->empCampusID }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Department
            </td>
            <td>
                {{ $content->empDeptID }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Position
            </td>
            <td>
                {{ $content->empPosID }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Emergency Contact Person
            </td>
            <td>
                {{ $content->empEmgcPerson }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Emergency Contact No.
            </td>
            <td>
                {{ $content->empEmgcPhone }}
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>