@extends('master')
@section('title', 'Employees')
@section('contents')
    <form action="{{ route('employees.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <th colspan="2">
                    Employee Create Form
                </th>
            </tr>
            <tr>
                <td>Card ID</td>
                <td><input type="text" name="empCardID"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="empName"></td>
            </tr>
            <tr>
                <td>NRC</td>
                <td><input type="text" name="empNRC"></td>
            </tr>
            <tr>
                <td>Join Date</td>
                <td><input type="text" name="empJoinDate"></td>
            </tr>
            <tr>
                <td>Phone No.</td>
                <td><input type="text" name="empPhone"></td>
            </tr>
            <tr>
                <td>Campus</td>
                <td>
                    <select name="empCampusID">
                        @foreach($campuses as $campus)
                        <option value="{{ $campus->id }}">{{ $campus->CampusName }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Department</td>
                <td>
                    <select name="empDeptID">
                        @foreach($depts as $dept)
                        <option value="{{ $dept->id }}">{{ $dept->deptName }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Position</td>
                <td>
                    <select name="empPosID">
                        @foreach($poss as $pos)
                        <option value="{{ $pos->id }}">{{ $pos->posName }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Emergency Contact Person</td>
                <td><input type="text" name="empEmgcPerson"></td>
            </tr>
            <tr>
                <td>Emergency Contact Phone No.</td>
                <td><input type="text" name="empEmgcPhone"></td>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" name="submit" value="Submit"></th>
            </tr>
        </table>
    </form>
    <hr>
    <table border="1">
        <tr>
            <td>
                id
            </td>
            <td>
                Name
            </td>
            <td>
                Config
            </td>
        </tr>
        @foreach ($employees as $employee)
        <tr>
            <td>
                {{ $employee->empCardID }}
            </td>
            <td>
                {{ $employee->empName }}
            </td>
            <td>
                <img src="https://idserver.kbtc.edu.mm/qrcodes/employees/{{ $employee->empCardID }}.png">
            </td>
            <td>
                <a href="{{ route('employees.show', $employee->id) }}">Details</a>|<a href="{{ route('employees.destroy', $employee->id) }}">Delete</a>
            </td>
            
        </tr>
        @endforeach
    </table>
@endsection