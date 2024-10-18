<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //

    public function index(Request $request)
    {

        if(auth()->user()->role == 'manager'){
            $manager = User::with('employee')->find(Auth::user()->id);
            $employees = $manager->employee;
            $tasks = Task::whereIn('employee_id', $employees->pluck('id'));
        }else{
            $employee = Employee::where('user_id' ,Auth::user()->id)->first();
            $tasks = Task::where('employee_id', $employee->id);
        }

        // Search functionality
        if ($request->has('search')) {
            $tasks = $tasks->where('title', 'like', '%' . $request->search . '%');
        }

        $tasks = $tasks->with('employee')->get(); // Eager load employees

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        if(auth()->user()->role == 'manager'){
            $manager = User::with('employee')->find(Auth::user()->id);
            $employees = $manager->employee;

        }else{
            $employees = Employee::where('id' , Auth::user()->id)->get();

        }
        return view('tasks.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }
}
