@extends('master')
@section('title', 'campuses')
@section('contents')
    <form action="{{ route('campuses.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <th colspan="2">
                    Employee Create Form
                </th>
            </tr>
            <tr>
                <td>Campus Name</td>
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
        @foreach ($contents as $campus)
        <tr>
            <td>
                {{ $campus->id }}
            </td>
            <td>
                {{ $campus->campusName }}
            </td>
            <td>
                <a href="{{ route('campuses.show', $campus->id) }}">Details</a>|<a href="{{ route('campuses.destroy', $campus->id) }}">Delete</a>
            </td>
            
        </tr>
        @endforeach
    </table>
@endsection