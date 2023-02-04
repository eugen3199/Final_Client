@extends('master')
@section('title', 'positions')
@section('contents')
<form action="{{ route('positions.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <th colspan="2">
                    Position Create Form
                </th>
            </tr>
            <tr>
                <td>Position Name</td>
                <td><input type="text" name="posName"></td>
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
                {{ $position->posName }}
            </td>
            <td>
                <a href="{{ route('positions.update', $position->id) }}">Update</a>|<a href="{{ route('positions.destroy', $position->id) }}">Delete</a>
            </td>
            
        </tr>
        @endforeach
    </table>
@endsection