<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->get('search');
        $employees = Employee::when($search, function ($query) use ($search) {
            return $query->where('first_name', 'like', "%{$search}%")
                         ->orWhere('last_name', 'like', "%{$search}%")
                         ->orWhere('salary', 'like', "%{$search}%");
        })->get();

        return view('employees.index', compact('employees', 'search'));
    }

    public function create()
    {
        $users = User::where('role' , 'manager')->get();
        $departments = Department::all();
        return view('employees.create',compact('users','departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'manager_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',

        ]);

        DB::beginTransaction();

        $employee = Employee::create($request->all());

        $user = User::create([
            'name' => $request['first_name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'role' =>'employee',
            'password' => Hash::make($request['password']),
        ]);

        $employee->user_id = $user->id;
        $employee->save();
        
        DB::commit();

        return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
    }

    public function edit(Employee $employee)
    {
        $users = User::where('role' , 'manager')->get();
        $departments = Department::all();
        return view('employees.edit', compact('employee' , 'users' , 'departments'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'manager_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
