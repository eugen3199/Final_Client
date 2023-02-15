@extends('master')
@section('title', 'Employee Detail')
@section('contents')
    <table>
        <tr>
            <th>
                Employee Card ID
            </th>
            <th>
                {{ $employees->empCardID }}
            </th>
        </tr>
        <tr>
            <td>
                Employee Name
            </td>
            <td>
                <input type="text" name="empName" value="{{ $employees->empName }}">
            </td>
        </tr>
        <tr>
            <td>
                Employee NRC
            </td>
            <td>
                <input type="text" name="empNRC" value="{{ $employees->empNRC }}">
                {{ $employees->empNRC }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Phone no.
            </td>
            <td>
                <input type="text" name="empPhone" value="{{ $employees->empPhone }}">
                {{ $employees->empPhone }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Join Date
            </td>
            <td>
                <input type="text" name="empJoinDate" value="{{ $employees->empJoinDate }}">
                {{ $employees->empJoinDate }}
            </td>
        </tr>
        <tr>
            <td>
                Employee Campus
            </td>
            <td>
                <select name="empCampusID">
                    @foreach($campuses as $campus)
                    <option value="{{ $campus->id }}" 
                        @if($campus->id==$employees->empCampusID)
                            selected
                        @endif
                    >{{ $campus->CampusName }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Employee Department
            </td>
            <td>
                <select name="empDeptID">
                    @foreach($depts as $dept)
                    <option value="{{ $dept->id }}" 
                        @if($dept->id==$employees->empDeptID)
                            selected
                        @endif
                    >{{ $dept->deptName }}</option>
                    @endforeach
                </select>
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