@extends('master')
@section('title', 'Employee Detail')
@section('contents')
    <table>
        <tr>
            <td>
                Employee Card ID
            </td>
            <td>
                {{ $employees->empCardID }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Name
            </td>
            <td>
                {{ $employees->empName }}
            </td>
        </tr>
        <tr>
            <td>
                Employee NRC
            </td>
            <td>
                {{ $employees->empNRC }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Phone no.
            </td>
            <td>
                {{ $employees->empPhone }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Join Date
            </td>
            <td>
                {{ $employees->empJoinDate }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Campus
            </td>
            <td>
                @foreach($campuses as $campus)
                    @if($campus->id==$employees->empCampusID)
                    {{ $campus->CampusName }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td>
                Employee Department
            </td>
            <td>
                @foreach($depts as $dept)
                    @if($dept->id==$employees->empDeptID)
                    {{ $dept->deptName }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td>
                Employee Position
            </td>
            <td>
                @foreach($poss as $pos)
                    @if($pos->id==$employees->empPosID)
                    {{ $pos->posName }}
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <td>
                Employee Emergency Contact Person
            </td>
            <td>
                {{ $employees->empEmgcPerson }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Emergency Contact No.
            </td>
            <td>
                {{ $employees->empEmgcPhone }}
            </td>
        </tr>
    </table>
@endsection