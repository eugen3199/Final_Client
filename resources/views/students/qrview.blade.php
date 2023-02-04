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
            <th colspan="2">{{ $content->studName }}'s Profile<br><img src="https://i.pinimg.com/originals/f1/0f/f7/f10ff70a7155e5ab666bcdd1b45b726d.jpg" width="200px"></th>
        </tr>
        <tr>
            <td>
                Student Card ID
            </td>
            <td>
                {{ $content->studCardID }}
            </td>
        </tr>
        <tr>
            <td>
                Student Name
            </td>
            <td>
                {{ $content->studName }}
            </td>
        </tr>
        <tr>
            <td>
                Student Date of Birth
            </td>
            <td>
                {{ $content->studDoB }}
            </td>
        </tr>
        
        <tr>
            <td>
                Student Guardian Name
            </td>
            <td>
                {{ $content->studGuardName }}
            </td>
        </tr>
        <tr>
            <td>
                Student Batch
            </td>
            <td>
                {{ $content->studBatchID }}
            </td>
        </tr>
        <tr>
            <td>
                Student Class
            </td>
            <td>
                {{ $content->studClassID }}
            </td>
        </tr>
        <tr>
            <td>
                School Emergency Call
            </td>
            <td>
                {{ $content->studEmgcCall }}
            </td>
        </tr>
        <tr>
            <td>
                Student Emergency Contact Phone (1)
            </td>
            <td>
                {{ $content->studEmgcPhone1 }}
            </td>
        </tr>
        <tr>
            <td>
                Student Emergency Contact Phone (2)
            </td>
            <td>
                {{ $content->studEmgcPhone2 }}
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>