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
                    @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->className }}</option>
                    @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Batch</td>
                <td>
                    <select name="studBatchID">
                        @foreach($batches as $batch)
                        <option value="{{ $batch->id }}">{{ $batch->batchName }} (
                            @foreach($classes as $class)
                                @if($class->id==$batch->batchClassID)
                                {{ $class->className }}
                                @endif
                            @endforeach
                        )</option>
                        @endforeach
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
                Batch
            </td>
            <td>
                Class
            </td>
            <td>
                Config
            </td>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>
                {{ $student->studCardID }}
            </td>
            <td>
                {{ $student->studName }}
            </td>
            <td>
            @foreach($batches as $batch)
                @if($batch->id==$student->studBatchID)
                {{ $batch->batchName }}
                (
                @foreach($classes as $class)
                    @if($class->id==$batch->batchClassID)
                    {{ $class->className }}
                    @endif
                @endforeach
                )
                @endif
            @endforeach
            </td>
            <td>
            @foreach($classes as $class)
                @if($class->id==$student->studClassID)
                {{ $class->className }}
                @endif
            @endforeach
            </td>
            <td>
                <img src="https://idserver.kbtc.edu.mm/students/qrcodes/{{ $student->studCardID }}.png"width="200px">
            </td>
            <td>
                <a href="{{ route('students.show', $student->id) }}">Details</a>|<a href="{{ route('students.destroy', $student->id) }}">Delete</a>
            </td>
            
        </tr>
        @endforeach
    </table>
@endsection