@extends('layout')

@section('title', 'Login')

@section('content')
<div class="container">
    <h1>{{ isset($department) ? 'Edit Department' : 'Add Department' }}</h1>

    <form action="{{ isset($department) ? route('departments.update', $department->id) : route('departments.store') }}" method="POST">
        @csrf
        @if (isset($department))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Department Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', isset($department) ? $department->name : '') }}" required>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($department) ? 'Update Department' : 'Create Department' }}</button>
    </form>
</div>
@endsection
