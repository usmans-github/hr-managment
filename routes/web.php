<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

//General Routes
Route::get('/', [AuthController::class, 'create']);

//Employee Routes

//Admin Routes
Route::resource('admin', AdminController::class);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index']);
    //Employee Controller
    Route::resource('employees', EmployeeController::class);
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