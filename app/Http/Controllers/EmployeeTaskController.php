<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeTaskController extends Controller
{
    //
    public function index()
    {

        $employeeIds = Auth::user()->employees->pluck('id');
        $tasks = Task::whereIn('employee_id', $employeeIds)->get();

        return view('EmpTasks.index', compact('tasks'));
    }


    public function edit(Task $task)
    {

        if ($task->employee_id !== Auth::user()->employee->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('EmpTasks.edit', compact('task'));
    }


    public function update(Request $request, Task $task)
    {

        if ($task->employee_id !== Auth::user()->employee->id) {
            abort(403, 'Unauthorized action.');
        }


        $request->validate([
            'description' => 'required|string',
            'status' => 'required|string|in:pending,in_progress,completed',
        ]);


        $task->update([
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->route('EmpTasks.index')->with('success', 'Task updated successfully.');
    }
}
