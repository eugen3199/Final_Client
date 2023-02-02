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
        @foreach ($contents as $content)
            {{ $content->empName }}'s Profile
        @endforeach
    </h1>
    <hr>
    <table border="1">
        @foreach ($contents as $content)
        <tr>
            <th colspan="2">QR Code<br><img src="https://idserver.kbtc.edu.mm/qrcodes/{{ $content->empCardID }}.png"></th>
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