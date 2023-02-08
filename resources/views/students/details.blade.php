@extends('master')
@section('title', 'Student Detail')
@section('contents')
<form action="{{ route('students.update', $student->id) }}" method="post">
    @csrf
    <table>
        <tr>
            <th colspan="2">{{ $student->studName }}'s Profile<br><img src="https://i.pinimg.com/originals/f1/0f/f7/f10ff70a7155e5ab666bcdd1b45b726d.jpg" width="200px">
            </th>
        </tr>
        <tr>
                <th colspan="2">
                    student Create Form
                </th>
            </tr>
            <tr>
                <td>Card ID</td>
                <td>{{ $student->studCardID }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="studName" value="{{ $student->studName }}"></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><input type="text" name="studDoB" value="{{ $student->studDoB }}"></td>
            </tr>
            <tr>
                <td>Student's Guardian name</td>
                <td><input type="text" name="studGuardName" value="{{ $student->studGuardName }}"></td>
            </tr>
            <tr>
                <td>School Emgergency Phone</td>
                <td><input type="text" name="SchoolEmgcCall" value="{{ $student->SchoolEmgcCall }}"></td>
            </tr>
            <tr>
                <td>Student's Emergency Phone No. (1)</td>
                <td><input type="text" name="studEmgcPhone1" value="{{ $student->studEmgcPhone1 }}"></td>
            </tr>
            <tr>
                <td>Student's Emergency Phone No. (2)</td>
                <td><input type="text" name="studEmgcPhone2" value="{{ $student->studEmgcPhone2 }}"></td>
            </tr>
            <tr>
                <td>Class</td>
                <td>
                    <select name="studClassID">
                        @foreach($classes as $class)
                        <option value="{{ $class->id }}" 
                            @if($class->id==$student->studClassID)
                                selected
                            @endif
                        >{{ $class->className }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Batch</td>
                <td>
                    <select name="studBatchID">
                        @foreach($batches as $batch)
                        <option value="{{ $batch->id }}"
                            @if($batch->id==$student->studBatchID)
                                selected
                            @endif
                            >{{ $batch->batchName }} (
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
@endsection