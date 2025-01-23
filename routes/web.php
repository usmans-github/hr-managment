<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//General Routes
Route::get('/', [UserController::class, 'index']);
// Route::post('/login', [UserController::class, 'login']);

//Employee Routes
Route::post('/user-dashboard', [EmployeeController::class, 'dashboard']);

//Admin Routes
Route::get('/admin-login', [AdminController::class, 'create']);
Route::post('/admin-login', [AdminController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    //Employee Controller
    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::get('/create-employee', [EmployeeController::class, 'create']);
    Route::post('/create-employee', [EmployeeController::class, 'store']);
    Route::get('/edit-employee/{id}', [EmployeeController::class, 'edit'])->name('edit-employee');
    Route::put('/update-employee/{id}', [EmployeeController::class, 'update']);
    Route::delete('/delete-employee/{id}', [EmployeeController::class, 'destroy'])->name('delete-employee');
    //Deparment Controller
    Route::get('/departments', [DepartmentsController::class, 'index']);
    Route::get('/create-department', [DepartmentsController::class, 'create']);
    Route::post('/create-department', [DepartmentsController::class, 'store']);
    Route::get('/edit-department/{id}', [DepartmentsController::class, 'edit'])->name('edit-department');
    Route::put('/update-department/{id}', [DepartmentsController::class, 'update']);
    Route::delete('/delete-department/{id}', [DepartmentsController::class, 'destroy'])->name('delete-department');
    //Position Controller
    Route::get('/create-position', [PositionController::class, 'create']);
    Route::post('/create-position', [PositionController::class, 'store']);
});