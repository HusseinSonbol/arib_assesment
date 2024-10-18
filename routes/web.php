<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployeeTaskController;
use App\Http\Controllers\HomeController; // Import HomeController

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Home route
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Employees resource routes
Route::resource('employees', EmployeeController::class)->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
});

Route::resource('departments', DepartmentController::class)->middleware('auth');
Route::get('department/search', [DepartmentController::class, 'search'])->name('departments.search')->middleware('auth');

Route::middleware('auth')->group(function () {

    Route::get('/emptasks', [EmployeeTaskController::class, 'index'])->name('emptasks.index');
    Route::get('/emptasks/{task}/edit', [EmployeeTaskController::class, 'edit'])->name('emptasks.edit');
    Route::put('/emptasks/{task}', [EmployeeTaskController::class, 'update'])->name('emptasks.update');
});
