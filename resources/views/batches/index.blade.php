@extends('master')
@section('title', 'Batches')
@section('contents')
    <form action="{{ route('batches.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <th colspan="2">
                    Employee Create Form
                </th>
            </tr>
            <tr>
                <td>Batch Name</td>
                <td><input type="text" name="batchName"></td>
            </tr>
            <tr>
                <td>Class Name</td>
                <td>
                    <select name="batchClassID">
                    @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->className }}</option>
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
                Class ID
            </td>
            <td>
                Config
            </td>
        </tr>
        @foreach($batches as $batch)
        <tr>
            <td>
            {{ $batch->id }}
            </td>
            <td>
            {{ $batch->batchName }}
            </td>
            <td>
                @foreach($classes as $class)
                    @if($class->id==$batch->batchClassID)
                    {{ $class->className }}
                    @endif
                @endforeach
            </td>
            <td>
                Config
            </td>
        </tr>
        @endforeach
    </table>
@endsection