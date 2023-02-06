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
                        <option value="1">ISR 1</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Department</td>
                <td>
                    <select name="empDeptID">
                        <option value="1">IT</option>
                        <option value="2">Admin</option>
                        <option value="3">HR</option>
                        <option value="4">Academic</option>
                        <option value="5">Sale & Consultancy</option>
                        <option value="6">Finance</option>
                        <option value="7">Student Affairs  Operation</option>
                        <option value="8">Marketing</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Position</td>
                <td>
                    <select name="empPosID">
                        <option value="1">Associate</option>
                        <option value="2">Senior Associate</option>
                        <option value="3">Assistant Manager</option>
                        <option value="4">Manager</option>
                        <option value="5">Supervisor</option>
                        <option value="6">Intern</option>
                        <option value="7">Principle</option>
                        <option value="8">Academic Manager</option>
                        <option value="9">Senior Academic Associate</option>
                        <option value="10">Lecturer</option>
                        <option value="11">Assistant Lecturer</option>
                        <option value="12">Main Teacher</option>
                        <option value="13">Language Teacher</option>
                        <option value="14">Assistant Teacher</option>
                        <option value="15">Hr Associate</option>
                        <option value="16">Admin Supervisor</option>
                        <option value="17">Admin Associate</option>
                        <option value="18">Office Staff</option>
                        <option value="19">Accountant</option>
                        <option value="20">Senior IT Associate</option>
                        <option value="21">IT Associate</option>
                        <option value="22">Sale Associate</option>
                        <option value="23">Graphic Designer</option>
                        <option value="24">Student Affairs Supervisor</option>
                        <option value="25">Student Affairs Associate</option>
                        <option value="26">Security</option>
                        <option value="27">Academic Associate</option>
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
        @foreach ($contents as $employee)
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