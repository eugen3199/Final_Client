@extends('master')
@section('title', 'Student Detail')
@section('student')
    <table>
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
                Class
            </td>
            <td>
                {{ $student->studClassID }}
            </td>
        </tr>
        <tr>
            <td>
                Batch
            </td>
            <td>
                {{ $student->studBatchID }}
            </td>
        </tr>
        <tr>
            <td>
                Date of Birth
            </td>
            <td>
                {{ $student->studDoB }}
            </td>
        </tr>
        <tr>
            <td>
                Guardian's Name
            </td>
            <td>
                {{ $student->studGuardName }}
            </td>
        </tr>
        <tr>
            <td>
                Emergency Phone (1)
            </td>
            <td>
                {{ $student->studEmgcPhone1 }}
            </td>
        </tr>
        <tr>
            <td>
                Emergency Phone (1)
            </td>
            <td>
                {{ $student->studEmgcPhone2 }}
            </td>
        </tr>
        <tr>
            <td>
                School Emergency Phone
            </td>
            <td>
                {{ $student->SchoolEmgcPhone }}
            </td>
        </tr>
    </table>
@endsection