@extends('master')
@section('title', 'Employee Detail')
@section('contents')
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
@endsection