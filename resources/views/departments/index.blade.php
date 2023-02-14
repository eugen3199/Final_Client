@extends('master')
@section('title', 'departments')
@section('contents')
    <form action="{{ route('departments.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <th colspan="2">
                    Employee Create Form
                </th>
            </tr>
            <tr>
                <td>department Name</td>
                <td><input type="text" name="deptName"></td>
            </tr>
            <tr>
                <td>Department Prefix</td>
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
                Prefix
            </td>
            <td>
                Config
            </td>
        </tr>
        @foreach ($contents as $department)
        <tr>
            <td>
                {{ $department->id }}
            </td>
            <td>
                {{ $department->deptName }}
            </td>
            <td>
                {{ $department->deptPrefixID }}
            </td>
            <td>
                <a href="{{ route('departments.show', $department->id) }}">Details</a>|<a href="{{ route('departments.destroy', $department->id) }}">Delete</a>
            </td>
            
        </tr>
        @endforeach
    </table>
@endsection