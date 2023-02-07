<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" students="IE=edge">
    <meta name="viewport" students="width=device-width, initial-scale=1.0">
    <title>QR View</title>
</head>
<body>
    <hr>
    <table border="1">
        @foreach ($studentss as $students)
        <tr>
            <th colspan="2">{{ $students->studName }}'s Profile<br><img src="https://i.pinimg.com/originals/f1/0f/f7/f10ff70a7155e5ab666bcdd1b45b726d.jpg" width="200px"></th>
        </tr>
        <tr>
            <td>
                Student Card ID
            </td>
            <td>
                {{ $students->studCardID }}
            </td>
        </tr>
        <tr>
            <td>
                Student Name
            </td>
            <td>
                {{ $students->studName }}
            </td>
        </tr>
        <tr>
            <td>
                Student Date of Birth
            </td>
            <td>
                {{ $students->studDoB }}
            </td>
        </tr>
        
        <tr>
            <td>
                Student Guardian Name
            </td>
            <td>
                {{ $students->studGuardName }}
            </td>
        </tr>
        <tr>
            <td>
                Student Batch
            </td>
            <td>
                @foreach($batches as $batch)
                    @if($batch->id==$student->studBatchID)
                        {{ $batch->batchName }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td>
                Student Class
            </td>
            <td>
                @foreach($classes as $class)
                    @if($class->id==$student->studClassID)
                        {{ $class->className }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td>
                School Emergency Call
            </td>
            <td>
                {{ $students->SchoolEmgcCall }}
            </td>
        </tr>
        <tr>
            <td>
                Student Emergency Contact Phone (1)
            </td>
            <td>
                {{ $students->studEmgcPhone1 }}
            </td>
        </tr>
        <tr>
            <td>
                Student Emergency Contact Phone (2)
            </td>
            <td>
                {{ $students->studEmgcPhone2 }}
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>