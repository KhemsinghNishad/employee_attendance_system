<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('clock-in', [EmployeeController::class, 'clockIn'])->name('clock.in');
    Route::post('clock-out', [EmployeeController::class, 'clockOut'])->name('clock.out');

    Route::get('/task/assign', [TaskController::class, 'index'])->name('task.assign');
    Route::get('/report', [TaskController::class, 'report'])->name('report');
    Route::get('/tasks/{date}', [TaskController::class, 'tasks'])->name('tasks');
    Route::post('/task/store', [TaskController::class, 'store'])->name('task.store');
});


Route::post('employee-entry', [EmployeeController::class, 'employeeEntry'])->name('employee.entry');
