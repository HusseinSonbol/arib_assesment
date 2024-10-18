<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    //
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try{
            $this->validator($request->all())->validate();

            DB::beginTransaction();
            $user = $this->create($request->all());

            if($request->role == "employee"){
                Employee::create([
                    'first_name' =>$request->name,
                    'user_id' =>$user->id,
                ]);
            }

            DB::commit();

            auth()->login($user);

            return redirect()->intended('home');
        }catch(Exception $ex){
            return redirect()->back()->with('error' ,$ex->getMessage());
        }

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],  // Requires password confirmation
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'role' => $data['role'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
