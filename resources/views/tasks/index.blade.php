@extends('layout')

@section('title', 'Login')

@section('content')

<div class="container mt-5">
    <h1>Task List</h1>
    <form action="{{ route('tasks.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" placeholder="Search tasks..." class="form-control" value="{{ request()->search }}">
        <button type="submit" class="btn btn-primary mt-2">Search</button>
    </form>
    @if (auth()->user()->role == 'manager')
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                @if (auth()->user()->role == 'employee')
                <th>actions</th>
                @endif

            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->employee->first_name }} {{ $task->employee->last_name }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                    @if (auth()->user()->role == 'employee')
                        <td> <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">Edit</a></td>
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
