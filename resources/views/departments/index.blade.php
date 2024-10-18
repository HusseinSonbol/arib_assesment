@extends('layout')

@section('title', 'Login')

@section('content')
<div class="container">
    <h1>Departments</h1>

    <form action="{{ route('departments.search') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="query" class="form-control" placeholder="Search departments">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <a href="{{ route('departments.create') }}" class="btn btn-success mb-3">Add Department</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Employee Count</th>
                <th>Total Salary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departments as $department)
            <tr>
                <td>{{ $department->id }}</td>
                <td>{{ $department->name }}</td>
                <td>{{ $department->employeeCount() }}</td>
                <td>{{ $department->totalSalary() }}</td>
                <td>
                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-primary">Edit</a>

                    <form action="{{ route('departments.destroy', $department->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
