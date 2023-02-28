@extends('master')
@section('title', 'Employees')
@section('contents')
    <form action="{{ route('employees.store') }}" method="post">
        @csrf
        <table>
            <tr>
                <th colspan="2">
                    Employee Create Form
                </th>
            </tr>
            <tr>
                <td>Card ID</td>
                <td><input type="text" name="empCardID"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="empName"></td>
            </tr>
            <tr>
                <td>NRC</td>
                <td><input type="text" name="empNRC"></td>
            </tr>
            <tr>
                <td>Join Date</td>
                <td><input type="text" name="empJoinDate"></td>
            </tr>
            <tr>
                <td>Phone No.</td>
                <td><input type="text" name="empPhone"></td>
            </tr>
            <tr>
                <td>Campus</td>
                <td>
                    <select name="empCampusID">
                        @foreach($campuses as $campus)
                        <option value="{{ $campus->id }}">{{ $campus->CampusName }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Department</td>
                <td>
                    <select name="empDeptID">
                        @foreach($depts as $dept)
                        <option value="{{ $dept->id }}">{{ $dept->deptName }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Position</td>
                <td>
                    <select name="empPosID">
                        @foreach($poss as $pos)
                        <option value="{{ $pos->id }}">{{ $pos->posName }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Emergency Contact Person</td>
                <td><input type="text" name="empEmgcPerson"></td>
            </tr>
            <tr>
                <td>Emergency Contact Phone No.</td>
                <td><input type="text" name="empEmgcPhone"></td>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" name="submit" value="Submit"></th>
            </tr>
        </table>
    </form>
    <hr>
    <table border="1">
        <tr>
            <th colspan="4" align="right">
                <form action="{{ route('employees.query') }}" method="get">
                    <input type="text" name="search_value" value="{{ $search_value }}"> | <input type="submit" name="submit" value="Search">
                </form>
            </th>
        </tr>
        <tr>
            <td>
                id
            </td>
            <td>
                Name
            </td>
            <td>
                QR
            </td>
            <td>
                Config
            </td>
        </tr>
        @foreach ($employees->data as $employee)
        <tr>
            <td>
                {{ $employee->empCardID }}
            </td>
            <td>
                {{ $employee->empName }}
            </td>
            <td>
                <img src="https://idserver.kbtc.edu.mm/employees/qrcodes/{{ $employee->empQR }}">
            </td>
            <td>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="Post">
                    <a href="{{ route('employees.show', $employee->id) }}">Details</a> | 
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete ID-{{ $employee->empCardID }} ({{ $employee->empName }})?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="4">
                @foreach($employees->links as $link)
                    <a href="{{ url('/dashboard/employees') }}?page=@if($link->label=='&laquo; Previous')@if($page-1<=0){{ 1 }}
                        @else{{$page-1}}
                        @endif
                    @elseif($link->label=='Next &raquo;')@if($page+1>$employees->last_page){{ $employees->last_page }}
                        @else{{$page+1}}
                        @endif
                    @else{{ $link->label }}
                    @endif">

                        <button>
                            @if($link->label=='&laquo; Previous')
                            Previous
                            @elseif($link->label=='Next &raquo;')
                            Next
                            @else
                            {{ $link->label }}
                            @endif
                        </button>
                    </a>
                @endforeach
            </td>
        </tr>
    </table>
@endsection