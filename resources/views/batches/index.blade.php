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
        @foreach ($contents as $batch)
        <tr>
            <td>
                {{ $batch->id }}
            </td>
            <td>
                {{ $batch->batchName }}
            </td>
            <td>
                <img src="https://idserver.kbtc.edu.mm/qrcodes/{{ $employee->empCardID }}.png">
            </td>
            <td>
                <a href="{{ route('batchs.show', $batch->id) }}">Details</a>|<a href="{{ route('batches.destroy', $batch->id) }}">Delete</a>
            </td>
            
        </tr>
        @endforeach
    </table>
@endsection