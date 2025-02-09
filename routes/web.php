<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ReportsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'create']);
Route::post('/login', [AuthController::class, 'authenticate']);


// Admin ROutes
Route::middleware(['auth'])->group(function () {

    Route::resource('admin', AdminController::class);
    Route::get('employees', [AdminController::class, 'employees'])->name('admin.employees');
    Route::resource('payroll', PayrollController::class);
    Route::resource('attendence', AttendenceController::class);
    Route::resource('reports', ReportsController::class);
    Route::resource('department', DepartmentsController::class);
    Route::resource('position', PositionController::class);
});

// Employee ROutes
Route::middleware(['auth'])->group(function () {

    Route::resource('employee', EmployeeController::class);
    
});
