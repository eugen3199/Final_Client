@extends('master')
@section('title', 'students')
@section('contents')
    <form action="{{ route('students.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <th colspan="2">
                    student Create Form
                </th>
            </tr>
            <tr>
                <td>Card ID</td>
                <td><input type="text" name="studCardID"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="studName"></td>
            </tr>
            <tr>
                <td>NRC</td>
                <td><input type="text" name="studNRC"></td>
            </tr>
            <tr>
                <td>Join Date</td>
                <td><input type="text" name="studJoinDate"></td>
            </tr>
            <tr>
                <td>Phone No.</td>
                <td><input type="text" name="studPhone"></td>
            </tr>
            <tr>
                <td>Class</td>
                <td>
                    <select name="studCampusID">
                        <option value="1">Main</option>
                        <option value="2">U Khun Zaw</option>
                        <option value="3">Mya Kan Thar</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Batch</td>
                <td>
                    <select name="studDeptID">
                        <option value="1">IT</option>
                        <option value="2">Admin</option>
                        <option value="3">HR</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Emergency Contact Person</td>
                <td><input type="text" name="studEmgcPerson"></td>
            </tr>
            <tr>
                <td>Emergency Contact Phone No.</td>
                <td><input type="text" name="studEmgcPhone"></td>
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
        @foreach ($contents as $student)
        <tr>
            <td>
                {{ $student->studCardID }}
            </td>
            <td>
                {{ $student->studName }}
            </td>
            <td>
                <img src="https://idserver.kbtc.edu.mm/qrcodes/{{ $student->studCardID }}.png">
            </td>
            <td>
                <a href="{{ route('students.show', $student->id) }}">Details</a>|<a href="{{ route('students.destroy', $student->id) }}">Delete</a>
            </td>
            
        </tr>
        @endforeach
    </table>
@endsection