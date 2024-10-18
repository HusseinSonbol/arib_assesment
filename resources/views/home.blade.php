<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Welcome to the Employee Management System!</h1>
        <p>You are logged in. {{auth()->user()->name}}</p>

        @if (auth()->user()->role == 'manager')
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
        <a href="{{ route('employees.index') }}" class="btn btn-primary">View Employees</a>
        <a href="{{ route('departments.index') }}" class="btn btn-primary">Departments</a>
        @else
        <a href="{{ route('tasks.index') }}" class="btn btn-primary">My Tasks</a>
        @endif


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
