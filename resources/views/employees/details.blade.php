@extends('master')
@section('title', 'Employee Detail')
@section('contents')
<form action="{{ route('employees.update', $employees->id) }}" method="post">
    @csrf
    <table>
        <tr>
            <th colspan="2">{{ $employees->empName }}'s Profile<br><img src="https://i.pinimg.com/originals/f1/0f/f7/f10ff70a7155e5ab666bcdd1b45b726d.jpg" width="200px">
            </th>
        </tr>
        <tr>
            <th colspan="2">
                Employee Create Form
            </th>
        </tr>
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
                <input type="text" name="empName" value="{{ $employees->empName }}">
            </td>
        </tr>
        <tr>
            <td>
                Employee NRC
            </td>
            <td>
                <input type="text" name="empNRC" value="{{ $employees->empNRC }}">
            </td>
        </tr>
        <tr>
            <td>
                Employee Phone no.
            </td>
            <td>
                <input type="text" name="empPhone" value="{{ $employees->empPhone }}">
            </td>
        </tr>
        <tr>
            <td>
                Employee Join Date
            </td>
            <td>
                <input type="text" name="empJoinDate" value="{{ $employees->empJoinDate }}">
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
                <select name="empPosID">
                    @foreach($poss as $pos)
                    <option value="{{ $dept->id }}" 
                        @if($pos->id==$employees->empPosID)
                            selected
                        @endif
                    >{{ $pos->posName }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Employee Emergency Contact Person
            </td>
            <td>
                <input type="text" name="empEmgcPerson" value="{{ $employees->empEmgcPerson }}">
            </td>
        </tr>
        <tr>
            <td>
                Employee Emergency Contact No.
            </td>
            <td>
                <input type="text" name="empEmgcPhone" value="{{ $employees->empEmgcPhone }}">
            </td>
        </tr>
        <tr>
            <td>
                
            </td>
            <td>
                <input type="submit" name="submit" value="submit">
            </td>
        </tr>
    </table>
</form>
@endsection