@extends('master')
@section('title', 'positions')
@section('contents')
    <form action="{{ route('positions.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <th colspan="2">
                    Employee Create Form
                </th>
            </tr>
            <tr>
                <td>position Name</td>
                <td><input type="text" name="campusName"></td>
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
        @foreach ($contents as $position)
        <tr>
            <td>
                {{ $position->id }}
            </td>
            <td>
                {{ $position->campusName }}
            </td>
            <td>
                <a href="{{ route('positions.show', $position->id) }}">Details</a>|<a href="{{ route('positions.destroy', $position->id) }}">Delete</a>
            </td>
            
        </tr>
        @endforeach
    </table>
@endsection