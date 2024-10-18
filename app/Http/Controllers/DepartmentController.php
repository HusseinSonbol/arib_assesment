<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //

    public function index()
    {
        $departments = Department::with('employees')->get();
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        return view('departments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments,name',
        ]);

        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Department created successfully.');
    }

    public function edit(Department $department)
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required|unique:departments,name,' . $department->id,
        ]);

        $department->update($request->all());
        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department)
    {
        if ($department->employees()->count() > 0) {
            return redirect()->route('departments.index')->with('error', 'Cannot delete department with assigned employees.');
        }

        $department->delete();
        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $departments = Department::where('name', 'like', '%' . $query . '%')
            ->with('employees')
            ->get();

        return view('departments.index', compact('departments'));
    }

}
