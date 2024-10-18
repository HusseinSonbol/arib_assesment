@extends('layout')

@section('title', 'Login')

@section('content')
    <div class="container mt-5">
        <h1>Edit Employee</h1>
        <form action="{{ route('employees.update', $employee) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $employee->first_name }}" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $employee->last_name }}" required>
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" step="0.01" name="salary" id="salary" class="form-control" value="{{ $employee->salary }}" required>
            </div>
            <div class="mb-3">
                <label for="manager_id" class="form-label">Manager</label>
                <select name="manager_id" id="manager_id" class="form-control" required>
                    <option value="">Select a manager</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ isset($employee) && $employee->manager_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="department_id" class="form-label">Department</label>
                <select name="department_id" class="form-control" required>
                    <option value="">Select Department</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ isset($employee) && $employee->department_id == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Employee</button>
            <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection

