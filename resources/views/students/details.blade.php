@extends('master')
@section('title', 'Student Detail')
@section('contents')
    <table>
        <tr>
            <th colspan="2">{{ $student->studName }}'s Profile<br><img src="https://i.pinimg.com/originals/f1/0f/f7/f10ff70a7155e5ab666bcdd1b45b726d.jpg" width="200px"></th>
        </tr>
        <tr>
            <td>
                Student Card ID
            </td>
            <td>
                {{ $student->studCardID }}
            </td>
        </tr>
        <tr>
            <td>
                Student Name
            </td>
            <td>
                {{ $student->studName }}
            </td>
        </tr>
        <tr>
            <td>
                Student Date of Birth
            </td>
            <td>
                {{ $student->studDoB }}
            </td>
        </tr>
        
        <tr>
            <td>
                Student Guardian Name
            </td>
            <td>
                {{ $student->studGuardName }}
            </td>
        </tr>
        <tr>
            <td>
                Student Batch
            </td>
            <td>
                {{ $batch->batchName }}
            </td>
        </tr>
        <tr>
            <td>
                Student Class
            </td>
            <td>
                {{ $class->className }}
            </td>
        </tr>
        <tr>
            <td>
                School Emergency Call
            </td>
            <td>
                {{ $student->SchoolEmgcCall }}
            </td>
        </tr>
        <tr>
            <td>
                Student Emergency Contact Phone (1)
            </td>
            <td>
                {{ $student->studEmgcPhone1 }}
            </td>
        </tr>
        <tr>
            <td>
                Student Emergency Contact Phone (2)
            </td>
            <td>
                {{ $student->studEmgcPhone2 }}
            </td>
        </tr>
    </table>
@endsection