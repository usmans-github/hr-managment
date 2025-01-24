<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'create']);


Route::get('admin', [AdminController::class, 'create']);




Route::middleware('auth')->group(function ()  {

    Route::resource('admin', AdminController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('department', DepartmentsController::class);
    Route::resource('position', PositionController::class);

});