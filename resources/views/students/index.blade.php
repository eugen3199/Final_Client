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
                <td>Date of Birth</td>
                <td><input type="text" name="studDoB"></td>
            </tr>
            <tr>
                <td>Student's Guardian name</td>
                <td><input type="text" name="studGuardName"></td>
            </tr>
            <tr>
                <td>School Emgergency Phone</td>
                <td><input type="text" name="SchoolEmgcCall"></td>
            </tr>
            <tr>
                <td>Student's Emergency Phone No. (1)</td>
                <td><input type="text" name="studEmgcPhone1"></td>
            </tr>
            <tr>
                <td>Student's Emergency Phone No. (2)</td>
                <td><input type="text" name="studEmgcPhone2"></td>
            </tr>
            <tr>
                <td>Class</td>
                <td>
                    <select name="studClassID">
                        <option value="1">Primary 1</option>
                        <option value="2">Sceondary 2</option>
                        <option value="3">Primary 5</option>
                        <option value="4">Pre IGESE</option>
                        <option value="5">IGCSE GED</option>
                        <option value="6">GED</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Batch</td>
                <td>
                    <select name="studBatchID">
                        <option value="1">Intake 1</option>
                        <option value="2">Intake 2</option>
                        <option value="3">Intake 3</option>
                        <option value="4">Intake 4</option>
                        <option value="5">Intake 5</option>
                    </select>
                </td>
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