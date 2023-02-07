@extends('master')
@section('title', 'classes')
@section('contents')
    <form action="{{ route('classes.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <th colspan="2">
                    Class Create Form
                </th>
            </tr>
            <tr>
                <td>Class Name</td>
                <td><input type="text" name="className"></td>
            </tr>
            <tr>
                <td>Prefix</td>
                <td><input type="text" name="prefixName"></td>
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
                Prefix ID
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
                {{ $class->className }}
            </td>
            <td>
                {{ $class->classPrefixID }}
            </td>
            <td>
                <a href="{{ route('classes.show', $class->id) }}">Details</a>|<a href="{{ route('classes.destroy', $class->id) }}">Delete</a>
            </td>
            
        </tr>
        @endforeach
    </table>
@endsection