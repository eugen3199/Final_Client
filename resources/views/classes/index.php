@extends('master')
@section('title', 'classes')
@section('contents')
    <form action="{{ route('classes.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <th colspan="2">
                    Employee Create Form
                </th>
            </tr>
            <tr>
                <td>class Name</td>
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
        @foreach ($contents as $class)
        <tr>
            <td>
                {{ $class->id }}
            </td>
            <td>
                {{ $class->campusName }}
            </td>
            <td>
                <a href="{{ route('classes.show', $class->id) }}">Details</a>|<a href="{{ route('classes.destroy', $class->id) }}">Delete</a>
            </td>
            
        </tr>
        @endforeach
    </table>
@endsection