@extends('layout')

@section('title', 'Login')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Employee Management</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
        </div>

        <form method="GET" action="{{ route('employees.index') }}" class="mb-3">
            <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search employees...">
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Salary</th>
                    <th>Manager Name</th>
                    <th>Full Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>{{ $employee->manager->name?? '' }}</td>
                        <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                        <td>
                            <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                                {{-- <a href="{{ route('emptasks.index', $employee->id) }}" class="btn btn-info">Tasks</a> --}}
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
