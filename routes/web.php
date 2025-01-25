<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'create']);
Route::post('/login', [AuthController::class, 'authenticate']);


// Admin ROutes
Route::middleware('auth')->group(function () {

    Route::resource('admin', AdminController::class);
    Route::resource('department', DepartmentsController::class);
    Route::resource('position', PositionController::class);
});

// Employee ROutes
Route::middleware('auth')->group(function () {

    Route::resource('employee', EmployeeController::class);

});
